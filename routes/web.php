<?php

use App\Http\Controllers\AutentikasiController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Autentikasi
Route::get('/l',[AutentikasiController::class, 'login']) -> name('login');
Route::post('/login',[AutentikasiController::class, 'loginStore']) -> name('login.store');
Route::post('/lo',[AutentikasiController::class, 'logout']) -> name('logout');
// Autentikasi

Route::get('/admin', [UserController::class, 'index']) -> name('admin.index');

// - Routing Mahasiswa -
Route::get('/admin/mahasiswa', [MahasiswaController::class, 'index']) -> name('mahasiswa.index');
Route::get('/admin/mahasiswa/create', [MahasiswaController::class, 'create']) -> name('mahasiswa.create');
Route::post('/admin/mahasiswa/create', [MahasiswaController::class, 'store']) -> name('mahasiswa.store');
Route::get('/admin/mahasiswa/edit/{id}', [MahasiswaController::class, 'edit']) -> name('mahasiswa.edit');
Route::put('/admin/mahasiswa/edit/{id}', [MahasiswaController::class, 'update']) -> name('mahasiswa.update');
Route::delete('/admin/mahasiswa/delete/{id}', [MahasiswaController::class, 'delete']) -> name('mahasiswa.delete');
Route::get('/admin/mahasiswa/print', [MahasiswaController::class, 'print']) -> name('mahasiswa.print');
// - Routing Mahasiswa - 
