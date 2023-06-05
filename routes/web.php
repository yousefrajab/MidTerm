<?php

use App\Http\Controllers\ExpensesController;
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

Route::get('/dashboard', function () {
    return view('layouts.dashboard');
})->name('dashboard');


// Route::get('/expenses', function () {
//     return view('front.expenses');
// });


// Route::get('/create_expenses', function () {
//     return view('front.create_expenses');
// });




Route::get('/', [ExpensesController::class, 'index'])->name('expenses');


Route::delete('delete/{id}', [ExpensesController::class, 'destroy'])->name('delete');

Route::post('create', [ExpensesController::class, 'create'])->name('create');
Route::get('create', [ExpensesController::class, 'create'])->name('create');



Route::post('store', [ExpensesController::class, 'store'])->name('store');
Route::get('store', [ExpensesController::class, 'store'])->name('store');


Route::get('update/{id}', [ExpensesController::class, 'update'])->name('update');
Route::post('update/{id}', [ExpensesController::class, 'update'])->name('update');

Route::get('edit/{id}', [ExpensesController::class, 'edit'])->name('edit');
Route::post('edit/{id}', [ExpensesController::class, 'edit'])->name('edit');
