<?php

namespace App\Http\Controllers;

use App\Facades\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public int $numQuotes = 5;
    public function get(Request $request)
    {
        if($request->filled('s')){
            return collect(Quote::driver('shakespeare')->get())->random($this->numQuotes);
        }
        return collect(Quote::get())->random($this->numQuotes);
    }
}
