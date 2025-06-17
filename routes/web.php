<?php

use App\Http\Controllers\KosakataController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
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

//Auth Routes
Route::get('admin/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('admin/login', [LoginController::class, 'login']);
Route::post('logout', [LogoutController::class, 'logout'])->name('logout');
Route::get('/', function () { return view('welcome');});

Route::middleware(['auth'])->group(function () {
    Route::resource('/admin/dashboard', KosakataController::class);
    Route::get('/admin/import', [\App\Http\Controllers\KosakataController::class, 'importForm'])->name('dashboard.importForm');
    Route::post('/admin/import', [\App\Http\Controllers\KosakataController::class, 'importCsv'])->name('dashboard.importCsv');
});


