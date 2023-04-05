<?php

namespace App\Services;

use InvalidArgumentException;

class CalculatorFactory
{

    public static function createCalculator($operator)
    {
        switch ($operator) {
            case '+':
                return new AdditionCalculator();
            case '-':
                return new SubtractionCalculator();
            case '*':
                return new MultiplicationCalculator();
            case '/':
                return new DivisionCalculator();
            default:
                throw new InvalidArgumentException("Invalid operator: $operator");
        }
    }
}
