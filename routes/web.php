<?php

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
    route::get('/', [MemberController::class, 'index'])->name('index');
});

route::get('login', [LoginController::class, 'index'])->name('login');

route::post('login-admin', [LoginController::class, 'loginAdmin'])->name('loginAdmin');
route::post('logout', [LoginController::class, 'logout'])->name('logout');
