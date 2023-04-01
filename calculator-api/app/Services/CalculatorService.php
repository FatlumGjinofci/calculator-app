<?php

namespace App\Services;

use App\Models\Calculator;

class CalculatorService {
    public function create($request)
    {
        return Calculator::create([
            'user_id' => auth()->id(),
            'expression' => $request->calculation['calculation']['expression'],
            'result' => $request->calculation['calculation']['result'],
        ]);
    }
}
