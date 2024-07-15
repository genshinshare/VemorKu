<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\View\PageController;
use App\Http\Controllers\View\PDF\PDFController;
use App\Http\Controllers\View\ProfileController;
use App\Http\Controllers\View\Table\ReportController;
use App\Http\Controllers\View\Table\UserController;
use App\Http\Controllers\View\Table\VehicleController;
use App\Http\Controllers\View\Table\ReportFinanceController;
use App\Http\Controllers\View\Table\DepartmentController;
use App\Http\Controllers\View\Table\DriverController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PageController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', 'checkRole:admin'])->group(function () {
    //user crud
    Route::get('/akun', [UserController::class, 'index'])->name('user');
    Route::get('/akun/cari', [UserController::class, 'search']);
    Route::get('/akun/tambah', [UserController::class, 'create'])->name('addUser');
    Route::post('/akun/store', [UserController::class, 'store'])->name('storeUser');
    Route::get('/akun/edit={id}', [UserController::class, 'edit'])->name('editUser');
    Route::put('/akun/{id}', [UserController::class, 'update'])->name('updateUser');
    Route::delete('/akun/hapus={id}', [UserController::class, 'destroy'])->name('deleteUser');
});

Route::middleware(['auth', 'checkRole:operator,admin'])->group(function () {
    //report crud
    Route::get('/laporan', [ReportController::class, 'index'])->name('report');
    Route::get('/laporan/cari', [ReportController::class, 'search']);
    Route::get('/laporan/tambah', [ReportController::class, 'create'])->name('addReport');
    Route::post('/laporan/store', [ReportController::class, 'store'])->name('storeReport');
    Route::get('/laporan/edit={report_id}', [ReportController::class, 'edit'])->name('editReport');
    Route::put('/laporan/{report_id}', [ReportController::class, 'update'])->name('updateReport');
    Route::delete('/laporan/hapus={report_id}', [ReportController::class, 'destroy'])->name('deleteReport');

    //report finance crud
    Route::get('/laporanKlaim', [ReportFinanceController::class, 'index'])->name('reportFinance');
    Route::get('/laporanKlaim/cari', [ReportFinanceController::class, 'search']);
    Route::get('/laporanKlaim/tambah', [ReportFinanceController::class, 'create'])->name('addReportFinance');
    Route::post('/laporanKlaim/store', [ReportFinanceController::class, 'store'])->name('storeReportFinance');
    Route::get('/laporanKlaim/edit={report_id}', [ReportFinanceController::class, 'edit'])->name('editReportFinance');
    Route::put('/laporanKlaim/{report_finance_id}', [ReportFinanceController::class, 'update'])->name('updateReportFinance');
    Route::delete('/laporanKlaim/hapus={report_finance_id}', [ReportFinanceController::class, 'destroy'])->name('deleteReportFinance');

    //vehicle crud
    Route::get('/kendaraan', [VehicleController::class, 'index'])->name('vehicle');
    Route::get('/kendaraan/cari', [VehicleController::class, 'search']);
    Route::get('/kendaraan/tambah', [VehicleController::class, 'create'])->name('addVehicle');
    Route::post('/kendaraan/store', [VehicleController::class, 'store'])->name('storeVehicle');
    Route::get('/kendaraan/edit={vehicle_id}', [VehicleController::class, 'edit'])->name('editVehicle');
    Route::put('/kendaraan/{vehicle_id}', [VehicleController::class, 'update'])->name('updateVehicle');
    Route::delete('/kendaraan/hapus={vehicle_id}', [VehicleController::class, 'destroy'])->name('deleteVehicle');

    //department crud
    Route::get('/departemen', [DepartmentController::class, 'index'])->name('department');
    Route::get('/departemen/tambah', [DepartmentController::class, 'create'])->name('addDepartment');
    Route::post('/departemen/store', [DepartmentController::class, 'store'])->name('storeDepartment');
    Route::get('/departemen/edit={id}', [DepartmentController::class, 'edit'])->name('editDepartment');
    Route::put('/departemen/{id}', [DepartmentController::class, 'update'])->name('updateDepartment');
    Route::delete('/departemen/hapus={id}', [DepartmentController::class, 'destroy'])->name('deleteDepartment');

    //driver crud
    Route::get('/driver', [DriverController::class, 'index'])->name('driver');
    Route::get('/driver/tambah', [DriverController::class, 'create'])->name('addDriver');
    Route::post('/driver/store', [DriverController::class, 'store'])->name('storeDriver');
    Route::get('/driver/edit={id}', [DriverController::class, 'edit'])->name('editDriver');
    Route::put('/driver/{id}', [DriverController::class, 'update'])->name('updateDriver');
    Route::delete('/driver/hapus={id}', [DriverController::class, 'destroy'])->name('deleteDriver');

    Route::get('/help', [PageController::class, 'help'])->name('petunjuk');
    Route::get('/vemor', [PDFController::class, 'vemor'])->name('vemor');
    Route::get('/vemor/pdf', [PDFController::class, 'vemorpdf']);
    Route::get('/carcondition', [PDFController::class, 'carcondition'])->name('carcondition');
    Route::get('/carcondition/pdf', [PDFController::class, 'carconditionpdf']);
    Route::get('/expensetahunan', [PDFController::class, 'expensetahunan'])->name('expensetahunan');
    Route::get('/expensetahunan/pdf', [PDFController::class, 'expensetahunanpdf']);
    Route::get('/rasiobbm', [PDFController::class, 'rasiobbm'])->name('rasiobbm');
    Route::get('/rasiobbm/pdf', [PDFController::class, 'rasiobbmpdf'])->name('rasiobbmpdf');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
