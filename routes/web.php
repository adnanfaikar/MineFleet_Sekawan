<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\VehicleRequestController;
use App\Exports\VehicleOrdersExport;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/export-orders', function (Request $request) {
    $startDate = $request->query('start_date');
    $endDate = $request->query('end_date');

    return Excel::download(new VehicleOrdersExport($startDate, $endDate), 'vehicle_orders.xlsx');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/export', function () {
    return view('export');
})->name('export');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/input', [VehicleRequestController::class, 'create'])->name('input');
    Route::post('/input', [VehicleRequestController::class, 'store']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/request', function () {
    return view('supervisor.request');
})->name('request');

Route::middleware(['auth'])->group(function () {
    Route::get('/supervisor/requests', [VehicleRequestController::class, 'indexForSupervisor'])->name('supervisor.requests');
    Route::post('/supervisor/requests/{id}/status', [VehicleRequestController::class, 'updateStatus']);
});
