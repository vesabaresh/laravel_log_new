<?php

use Illuminate\Support\Facades\Route;
use App\Models\Request_logs;
use App\Http\Controllers\LogController;
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
Route::get('/', [LogController::class, 'index']);
Route::get('/logs-data', [LogController::class, 'getData'])->name('logs.data');