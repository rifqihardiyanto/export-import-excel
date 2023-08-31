<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClossingController;

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

Route::get('/clossing', [ClossingController::class, 'index'])->name('clossing');

Route::get('/tambahclossing', [ClossingController::class, 'tambahclossing'])->name('tambahclossing');

Route::post('/storeclossing', [ClossingController::class, 'store'])->name('storeclossing');

Route::get('/editclossing/{id}', [ClossingController::class, 'edit'])->name('editdata');

Route::post('/updateclossing/{id}', [ClossingController::class, 'update'])->name('update');


Route::get('/deleteclossing/{id}', [ClossingController::class, 'delete'])->name('delete');


Route::post('/importexcel', [ClossingController::class, 'importexcel'])->name('importexcel');

Route::get('/exportexcel', [ClossingController::class, 'export'])->name('export');