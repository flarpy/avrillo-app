<?php

namespace App\Http\Controllers;

use App\Exceptions\QuoteException;
use App\Facades\Quote;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

class QuoteController extends Controller
{
    public int $numQuotes = 5;
    public function get(Request $request):Collection|JsonResponse
    {
        try {
            if($request->filled('s')){
                return collect(Quote::driver('shakespeare')->get())->random($this->numQuotes);
            }
            return collect(Quote::get())->random($this->numQuotes);
        } Catch (QuoteException $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
