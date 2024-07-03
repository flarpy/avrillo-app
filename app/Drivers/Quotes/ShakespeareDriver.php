<?php

namespace App\Drivers\Quotes;

use App\Interfaces\QuoteInterface;

class ShakespeareDriver extends QuoteDriver implements QuoteInterface
{
    public array $quotes = [
        'Love is a smoke and is made with the fume of sighs',
        'If love be blind, love cannot hit the mark.',
        'Is love a tender thing? It is too rough, Too rude, too boisterous, and it pricks like thorn.',
        'Love moderately. Long love doth so. Too swift arrives as tardy as too slow.',
        'O teach me how I should forget to think.',
        'Alas, that love, so gentle in his view, Should be so tyrannous and rough in proof',
    ];

    public function get(): array
    {
        return $this->quotes;
    }
}
