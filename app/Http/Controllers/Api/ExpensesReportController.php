<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Expense;

class ExpensesReportController extends Controller
{
    public function index(Request $request)
    {
        // Validate date input
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        // Fetch expenses data based on the date range
        $expenses = Expense::whereBetween('date', [$request->start_date, $request->end_date])->get();

        // Return the expenses data as JSON
        return response()->json($expenses);
    }
}

