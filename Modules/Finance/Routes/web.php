<?php

use Illuminate\Support\Facades\Route;
use Modules\Finance\Http\Controllers\CompanyController;
use Modules\Finance\Http\Controllers\FinanceController;

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

Route::get('/', [FinanceController::class, 'index'])->name('finance');

Route::group([
    'as'=> 'companies.',
],function (){
    Route::get('create', [CompanyController::class, 'create'])->name('create')->middleware('auth:web');
    Route::post('store', [CompanyController::class, 'store'])->name('store')->middleware('auth:web');
});
