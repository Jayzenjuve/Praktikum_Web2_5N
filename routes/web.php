<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\MahasiswaController;
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

Route::get('/login', function () {
    return view('login');
});

Route::get('/admin', [UserController::class, 'index']);


// - Routing Mahasiswa -
Route::get('/admin/mahasiswa', [MahasiswaController::class, 'index']);
Route::get('/admin/mahasiswa/create', [MahasiswaController::class, 'create']);
Route::post('/admin/mahasiswa/create', [MahasiswaController::class, 'store']);
Route::get('/admin/mahasiswa/edit/{id}', [MahasiswaController::class, 'edit']);
Route::put('/admin/mahasiswa/edit/{id}', [MahasiswaController::class, 'update']);
Route::delete('/admin/mahasiswa/delete/{id}', [MahasiswaController::class, 'delete']);
// - Routing Mahasiswa - 
