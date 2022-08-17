<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class QuoteController extends Controller
{
    public function getQuote()
    {
        $quotes = collect(config('quotes'));
        return response()->json($quotes->random());
    }

    public function getAllQuotes()
    {
        $quotes = collect(config('quotes'));
        return response()->json($quotes);
    }
   
}
