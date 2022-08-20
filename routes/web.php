<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('/dashboard') -> group(function () {
    Route::get('/', [DashboardController::class, "index"]) -> name('dashboard');
    Route::post('/store', [DashboardController::class, "store"]) -> name('dashboard.store');
    Route::get('/{product_id}/delete', [DashboardController::class, "delete"]) -> name('dashboard.delete');
    Route::get('/{product_id}/status', [DashboardController::class, "status"]) -> name('dashboard.status');
    Route::get('/edit', [DashboardController::class, "edit"]) -> name('dashboard.edit');
    Route::get('/{product_id}/update', [DashboardController::class, "update"]) -> name('dashboard.update');
});
