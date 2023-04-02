<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Calculator;
use App\Services\CalculationService;
use App\Services\CalculatorService;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function index()
    {
        $calculations = Calculator::where('user_id', auth()->id())->get();

        return response()->json([
            'status' => true,
            'calculations' => $calculations
        ]);
    }

    public function store(Request $request, CalculatorService $calculatorService)
    {
        try {
            $calculatorService->create($request);

            return response()->json([
                'status' => true,
                'message' => 'Created successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong!'
            ], 400);
        }
    }

    public function calculation(Request $request, CalculationService $calculationService) {
        try {
            $result = $calculationService->calculate($request->formula);
            return response()->json([
                'status' => true,
                'result' => $result
            ]);
        }
        catch(\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error'
            ]);
        }
    }
}
