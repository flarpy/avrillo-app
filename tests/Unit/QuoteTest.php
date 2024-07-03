<?php

namespace Tests\Unit;

use App\Drivers\Quotes\KanyeDriver;
use App\Drivers\Quotes\ShakespeareDriver;
use App\Facades\Quote;
use PHPUnit\Framework\TestCase;

class QuoteTest extends TestCase
{
    public function test_driver()
    {
        Quote::shouldReceive('get')
            ->once()
            ->andReturn([]);
        $this->assertIsArray(Quote::get());
    }

    public function test_kanye(): void
    {
        $driver = new KanyeDriver();
        $this->assertObjectHasProperty('quotes', $driver);
        $this->assertEmpty($driver->quotes);
    }

    public function test_shakespeare(): void
    {
        $driver = new ShakespeareDriver();
        $this->assertObjectHasProperty('quotes', $driver);
        $this->assertNotEmpty($driver->quotes);
    }
}
