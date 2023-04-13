<?php

use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\ExportImportController;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/chart', [DashboardUserController::class, 'index']);

Route::get('/export-import', [ExportImportController::class,'index']);
Route::get('/export-user', [ExportImportController::class,'export']);
Route::post('/import-user', [ExportImportController::class,'import']);

Route::get('/generate-pdf', [PDFController::class,'index']);
