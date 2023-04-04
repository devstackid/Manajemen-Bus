<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BusController;
use App\Http\Controllers\Api\DriverController;
use App\Http\Controllers\Api\TerminalController;

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

Route::resource('buses', DriverController::class);
Route::resource('drivers', DriverController::class);
Route::resource('terminals', TerminalController::class);