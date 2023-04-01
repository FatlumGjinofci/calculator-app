<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Calculator;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function index(Request $request)
    {
        $calculations = Calculator::where('user_id', auth()->id())->get();

        return response()->json([
            'status' => true,
            'calculations' => $calculations
        ]);
    }

    public function store(Request $request)
    {
        Calculator::create([
            'user_id' => auth()->id(),
            'expression' => $request->calculation['calculation']['expression'],
            'result' => $request->calculation['calculation']['result'],
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Created'
        ]);
    }
}
