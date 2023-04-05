<?php

namespace App\Services;

use App\Interfaces\Calculator;

class SubtractionCalculator implements Calculator
{

    public function calculate($num1, $num2)
    {
        return $num1 - $num2;
    }
}
