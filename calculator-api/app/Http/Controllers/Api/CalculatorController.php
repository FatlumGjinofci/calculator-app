<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Calculator;
use App\Services\CalculationService;
use App\Services\CalculatorFactory;
use App\Services\CalculatorService;
use Illuminate\Http\Request;
use InvalidArgumentException;

class CalculatorController extends Controller
{
    public function calculate(Request $request)
    {
        $num1 = $request->input('num1');
        $num2 = $request->input('num2');
        $operator = $request->input('operator');
        $operands = $request->input('operands');
        $expression = $request->input('expression');

        if (isset($operands)) {
            $operands = array_map('intval', $operands);
        } elseif (isset($num1) && isset($num2)) {
            $operands = [$num1, $num2];
        } elseif (isset($num1)) {
            $operands = [$num1];
        } elseif (isset($expression)) {
            $operands = $this->parseExpression($expression);
        } else {
            throw new InvalidArgumentException("Missing input parameters");
        }

        $calculator = CalculatorFactory::createCalculator($request->expression);
        $result = $calculator->calculate($request->num1, $request->num2);

        return response()->json([
            'result' => $result
        ]);
    }

    private function parseExpression($expression)
    {
        $tokens = preg_split("/([\+\-\*\/\(\)])/",$expression, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
        $stack = [];
        $current_expression = &$stack[];
        foreach ($tokens as $token) {
            if ($token == '(') {
                $current_expression = &$current_expression[];
            } elseif ($token == ')') {
                array_pop($stack);
                $current_expression = &$stack[count($stack) - 1];
            } elseif (in_array($token, ['+', '-', '*', '/'])) {
                $current_expression[] = $token;
            } else {
                $current_expression[] = intval($token);
            }
        }
        return $stack[0];
    }
}
