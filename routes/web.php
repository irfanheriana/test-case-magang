<?php

use App\Models\Employee;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Auth;

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
    $jumlahpegawai = Employee::count();

    return view('welcome', compact('jumlahpegawai'));
})->middleware('auth');

// route untuk data pegawai
Route::get('/pegawai',[EmployeeController::class, 'index'])->name('pegawai')->middleware('auth');

// menampilkan tabel pegawai
Route::get('/tambahpegawai',[EmployeeController::class, 'tambahpegawai'])->name('tambahpegawai');
// isert tabel pegawai
Route::post('/insertpegawai',[EmployeeController::class, 'insertpegawai'])->name('insertpegawai');

// edit tabel pegawai
Route::get('/editpegawai/{id}',[EmployeeController::class, 'editpegawai'])->name('editpegawai');
// update tabel pegawai
Route::post('/updatepegawai/{id}',[EmployeeController::class, 'updatepegawai'])->name('updatepegawai');
// delete tabel pegawai
Route::get('/deletepegawai/{id}',[EmployeeController::class, 'deletepegawai'])->name('deletepegawai');

// export pdf
Route::get('/exportpdf',[EmployeeController::class, 'exportpdf'])->name('exportpdf');
// export Excell
Route::get('/exportexcell',[EmployeeController::class, 'exportexcell'])->name('exportexcell');



// login
Route::get('/login',[LoginController::class, 'login'])->name('login');
Route::post('/loginproses',[LoginController::class, 'loginproses'])->name('loginproses');

// register
Route::get('/register',[LoginController::class, 'register'])->name('register');
Route::post('/registeruser',[LoginController::class, 'registeruser'])->name('registeruser');

// logout
Route::get('/logout',[LoginController::class, 'logout'])->name('logout');




