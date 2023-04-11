<?php

use App\Http\Controllers\ExpenseController;
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


Route::get('/', [ExpenseController::class, 'index'])->name('expenses');

Route::post('/create', [ExpenseController::class, 'create']);
Route::get('/create', [ExpenseController::class, 'create']);
Route::post('/delete/{id}', [ExpenseController::class, 'delete']);


Route::put('update/{id}', [ExpenseController::class, 'update'])->name('update');
Route::get('update/{id}', [ExpenseController::class, 'update'])->name('update');


Route::patch('edit/{id}', [ExpenseController::class, 'edit'])->name('edit');
Route::get('edit/{id}', [ExpenseController::class, 'edit'])->name('edit');
