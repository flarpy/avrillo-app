<?php

namespace App\Drivers\Quotes;

use Illuminate\Support\Manager;

class QuoteManager extends Manager
{
    public function createKanyeDriver()
    {
        return new KanyeDriver();
    }

    public function createShakespeareDriver()
    {
        return new ShakespeareDriver();
    }
    public function getDefaultDriver()
    {
        return $this->config->get('quote.driver', 'kanye');
    }
}
