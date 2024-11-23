<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report; // Ensure you have this model for your reports

class SalesController extends Controller
{
    public function index(Request $request)
    {
        // Validate date input
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        // Fetch sales data based on the date range
        $reports = Report::whereBetween('date', [$request->start_date, $request->end_date])->get();

        // Return the sales data as JSON
        return response()->json($reports);
    }
}
