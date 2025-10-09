<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MataKuliahController;


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

Route::get('/profile/{nama}/{npm}/{kelas}   ', [ProfileController::class, 'profile']);


Route::get('/user', [UserController::class, 'index']);
Route::get('/user/create', [UserController::class, 'create'])->name('user_create');
Route::post('/user', [UserController::class, 'store'])->name('user_store');

Route::get('/mata_kuliah', [MataKuliahController::class, 'index']);
Route::get('/mata_kuliah/create', [MataKuliahController::class, 'create'])->name('matakuliah.create');
Route::post('/mata_kuliah', [MataKuliahController::class, 'store'])->name('matakuliah.store');
