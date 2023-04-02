<?php

namespace App\Services;

class CalculationService
{
    public function calculate($formula)
    {
        $pattern = '/^\s*(\d+(\.\d+)?)(\s*[\+\-\*\/]\s*\d+(\.\d+)?)*(\s*[\+\-\*\/]\s*\((\s*\d+(\.\d+)?\s*[\+\-\*\/]\s*)+\d+(\.\d+)?\s*\))*\s*$/';

        if (!preg_match($pattern, $formula)) {
            return null;
        }

        // Evaluate the formula using the Shunting Yard Algorithm
        $tokens = preg_split('/([\+\-\*\/\(\)])/i', $formula, null, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
        $operators = new \Illuminate\Support\Collection();
        $values = new \Illuminate\Support\Collection();

        foreach ($tokens as $token) {
            if (preg_match('/^\d+(\.\d+)?$/', $token)) {
                // Token is a number, push it to the values stack
                $values->push(floatval($token));
            } elseif (preg_match('/^[\+\-\*\/]$/', $token)) {
                // Token is an operator, push it to the operators stack
                while (!$operators->isEmpty() && $this->precedence($operators->last()) >= $this->precedence($token)) {
                    $this->applyOperator($operators->pop(), $values);
                }
                $operators->push($token);
            } elseif ($token == '(') {
                // Token is an opening parenthesis, push it to the operators stack
                $operators->push($token);
            } elseif ($token == ')') {
                // Token is a closing parenthesis, pop operators until we reach the matching opening parenthesis
                while (!$operators->isEmpty() && $operators->last() != '(') {
                    $this->applyOperator($operators->pop(), $values);
                }
                if (!$operators->isEmpty() && $operators->last() == '(') {
                    $operators->pop();
                }
            }
        }

        // Apply any remaining operators to the values stack
        while (!$operators->isEmpty()) {
            $this->applyOperator($operators->pop(), $values);
        }

        // The final result is the only remaining value on the values stack
        return $values->pop();
    }

    private function applyOperator($operator, &$values)
    {
        $b = $values->pop();
        $a = $values->pop();

        switch ($operator) {
            case '+':
                $values->push($a + $b);
                break;
            case '-':
                $values->push($a - $b);
                break;
            case '*':
                $values->push($a * $b);
                break;
            case '/':
                $values->push($a / $b);
                break;
        }
    }

    private function precedence($operator)
    {
        switch ($operator) {
            case '+':
            case '-':
                return 1;
            case '*':
            case '/':
                return 2;
            default:
                return 0;
        }
    }
}
