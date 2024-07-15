<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Table\UserAPIController;
use App\Http\Controllers\Api\Table\VehicleAPIController;
use App\Http\Controllers\Api\Table\ReportAPIController;
use App\Http\Controllers\Api\Table\DepartmentAPIController;
use App\Http\Controllers\Api\Table\DriverAPIController;
use App\Http\Controllers\Api\Table\ReportFinanceAPIController;
use App\Http\Controllers\Api\PDF\CarConditionAPIController;
use App\Http\Controllers\Api\PDF\ExpenseTahunanAPIController;
use App\Http\Controllers\Api\PDF\RasioBBMAPIController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::middleware(['auth:sanctum', 'checkRole:admin'])->group(function () {
    Route::get('account', [UserAPIController::class, 'index']);
    Route::post('auth/register', RegisterController::class);
    Route::get('account/search', [UserAPIController::class, 'search']);
    Route::get('account/show={id}', [UserAPIController::class, 'show']);
    Route::post('account/store', [UserAPIController::class, 'store']);
    Route::put('account/{id}', [UserAPIController::class, 'update']);
    Route::delete('account/delete={id}', [UserAPIController::class, 'destroy']);
});

Route::middleware(['auth:sanctum', 'checkRole:admin,operator'])->group(function () {
    Route::get('vehicle', [VehicleAPIController::class, 'index']);
    Route::get('vehicle/all', [VehicleAPIController::class, 'indexAll']);
    Route::get('vehicle/search', [VehicleAPIController::class, 'search']);
    Route::get('vehicle/show={vehicle_id}', [VehicleAPIController::class, 'show']);
    Route::post('vehicle/store', [VehicleAPIController::class, 'store']);
    Route::put('vehicle/{vehicle_id}', [VehicleAPIController::class, 'update']);
    Route::delete('vehicle/delete={vehicle_id}', [VehicleAPIController::class, 'destroy']);

    Route::get('report', [ReportAPIController::class, 'index']);
    Route::get('report/searchAll', [ReportAPIController::class, 'searchAll']);
    Route::get('report/search', [ReportAPIController::class, 'search']);
    Route::get('report/searchLast', [ReportAPIController::class, 'searchLast']);
    Route::get('report/show={report_id}', [ReportAPIController::class, 'show']);
    Route::post('report/store', [ReportAPIController::class, 'store']);
    Route::put('report/{report_id}', [ReportAPIController::class, 'update']);
    Route::delete('report/delete={report_id}', [ReportAPIController::class, 'destroy']);

    Route::get('reportFinance', [ReportFinanceAPIController::class, 'index']);
    Route::get('reportFinance/searchAll', [ReportFinanceAPIController::class, 'searchAll']);
    Route::get('reportFinance/search', [ReportFinanceAPIController::class, 'search']);
    Route::get('reportFinance/show={report_id}', [ReportFinanceAPIController::class, 'show']);
    Route::post('reportFinance/store', [ReportFinanceAPIController::class, 'store']);
    Route::put('reportFinance/{report_id}', [ReportFinanceAPIController::class, 'update']);
    Route::delete('reportFinance/delete={report_id}', [ReportFinanceAPIController::class, 'destroy']);

    Route::get('/department', [DepartmentAPIController::class, 'index']);
    Route::post('/department/store', [DepartmentAPIController::class, 'store']);
    Route::get('/department/show={id}', [DepartmentAPIController::class, 'show']);
    Route::put('/department/{id}', [DepartmentAPIController::class, 'update']);
    Route::delete('/department/delete={id}', [DepartmentAPIController::class, 'destroy']);

    Route::get('/driver', [DriverAPIController::class, 'index']);
    Route::post('/driver/store', [DriverAPIController::class, 'store']);
    Route::get('/driver/show={id}', [DriverAPIController::class, 'show']);
    Route::put('/driver/{id}', [DriverAPIController::class, 'update']);
    Route::delete('/driver/delete={id}', [DriverAPIController::class, 'destroy']);

    
    Route::get('carcondition/data', [CarConditionAPIController::class, 'data']);
    Route::get('carcondition/dateRequested', [CarConditionAPIController::class, 'dateRequested']);
    Route::get('carcondition/timeReport', [CarConditionAPIController::class, 'timeReport']);

    Route::get('expensetahunan', [ExpenseTahunanAPIController::class, 'expensetahunan']);

    Route::get('rasiobbm', [RasioBBMAPIController::class, 'rasiobbm']);
});

Route::post('auth/login', LoginController::class);