<?php

namespace App\Drivers\Quotes;

use App\Exceptions\QuoteException;
use App\Interfaces\QuoteInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class KanyeDriver extends QuoteDriver implements QuoteInterface
{
    const CACHE_KEY = 'kanye_quotes';
    const CACHE_TTL = 3600;// time to live in seconds for cache entry

    public function get(): array
    {
        if(Cache::has(self::CACHE_KEY)){
            return Cache::get(self::CACHE_KEY);
        }
        $client = new Client();
        try {
            $response = $client->get(env('KANYE_API_URL'));
        } catch (ClientException $e) {
            Log::info($e->getMessage());
            abort(400, 'Sorry, Kanye is having communication problems');
        } catch (ServerException $e) {
            Log::error($e->getMessage());
            abort(500, 'Sorry, Kanye is in a meeting right now, please leave a message');
        }
        $quoteData = $response->getBody()->getContents();
        if(false === json_validate($quoteData)){
            throw new QuoteException('Invalid quote data: '. $quoteData);
        }
        $this->quotes = json_decode($quoteData);
        Cache::put(self::CACHE_KEY, $this->quotes, self::CACHE_TTL);
        return $this->quotes;
    }
}
