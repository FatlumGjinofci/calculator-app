<?php

namespace App\Services;

use App\Interfaces\Calculator;
use http\Exception\InvalidArgumentException;

class DivisionCalculator implements Calculator
{

    public function calculate($num1, $num2)
    {
        if ($num2 == 0) {
            throw new InvalidArgumentException('Error - Division by 0');
        }

        return $num1 / $num2;
    }
}
