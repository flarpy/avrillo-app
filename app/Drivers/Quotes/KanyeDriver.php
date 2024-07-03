<?php

namespace App\Drivers\Quotes;

use App\Interfaces\QuoteInterface;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

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
        $response = $client->get(env('KANYE_API_URL'));
        $this->quotes = json_decode($response->getBody()->getContents());
        Cache::put(self::CACHE_KEY, $this->quotes, self::CACHE_TTL);
        return $this->quotes;
    }
}
