<?php

namespace Tests\Feature;

use App\Facades\Quote;
use Tests\TestCase;

class QuoteTest extends TestCase
{
    public function test_kanye(): void
    {
        $quotes = Quote::get();
        $this->assertNotEmpty($quotes);
        $this->assertIsArray($quotes);
    }

    public function test_shakespeare(): void
    {
        $quotes = Quote::driver('shakespeare')->get();
        $this->assertNotEmpty($quotes);
        $this->assertIsArray($quotes);
    }
}
