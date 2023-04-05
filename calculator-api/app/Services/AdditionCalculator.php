<?php

namespace App\Services;

use App\Interfaces\Calculator;

class AdditionCalculator implements Calculator
{
    public function calculate($num1, $num2)
    {
        return $num1 + $num2;
        //        $result = 0;
        //        foreach ($operands as $operand) {
        //            if(is_array($operand)) {
        //                $operand = $this->calculate($operand);
        //            }
        //            $result += $operand;
        //        }
        //        return $result;
    }
}
