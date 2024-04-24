<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberController;
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
Route::group(['prefix' => '/', 'middleware' => 'login'], function () {
    route::get('/', [AdminController::class, 'index'])->name('index');
    route::post('/foto-admin-store', [AdminController::class, 'storeAdminFoto'])->name('foto.admin.store');
    route::get('/data-member', [AdminController::class, 'dataMember'])->name('data-member');
});
route::post('/daftar-member', [MemberController::class, 'daftar'])->name('daftar-member');

route::get('login', [LoginController::class, 'index'])->name('login');

route::post('login-admin', [LoginController::class, 'loginAdmin'])->name('loginAdmin');
route::post('logout', [LoginController::class, 'logout'])->name('logout');
