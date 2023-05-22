<?php

use App\Http\Controllers\VisitorController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/visitors', [VisitorController::class, 'index'])->name('visitors.all');
Route::get('/visitors-create', [VisitorController::class, 'create'])->name('visitors.create');
Route::post('/visitors-store', [VisitorController::class, 'store'])->name('visitor.store');
Route::get('/visitors-edit/{id}', [VisitorController::class, 'edit'])->name('visitors.edit');
Route::post('/visitors-update/{id}', [VisitorController::class, 'update'])->name('visitor.update');
Route::delete('/visitors-delete/{id}', [VisitorController::class, 'destroy'])->name('visitor.delete');
