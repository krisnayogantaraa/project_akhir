<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;


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

Route::middleware(['auth'])->group(function () {
    Route::get('/', [FinanceController::class, 'index'])->name('index');
    Route::get('/home', [FinanceController::class, 'index'])->name('index');
    Route::resource('finances', FinanceController::class);
Route::get('/trans', [FinanceController::class, 'transaction'])->name('trans');
});

Auth::routes();


