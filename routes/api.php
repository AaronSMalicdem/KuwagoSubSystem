<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Api\ExpensesReportController;
use App\Http\Controllers\Api\SalesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});




Route::get('/expenses-report', [ExpensesReportController::class, 'index']);

Route::get('/sales', [SalesController::class, 'index']);
Route::get('/api/breakdown/{date}', function ($date) {
    $expenses = Expense::whereDate('date', $date)->get();
    $sales = Report::whereDate('date', $date)->get();

    return response()->json([
        'expenses' => $expenses,
        'sales' => $sales,
    ]);
});