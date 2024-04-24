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
    route::get('/admin', [AdminController::class, 'index'])->name('admin');
    route::post('/foto-admin-store', [AdminController::class, 'storeAdminFoto'])->name('foto.admin.store');
    route::get('/data-member', [AdminController::class, 'dataMember'])->name('data-member');
    Route::get('edit-member/{id}/detail', [AdminController::class, 'editDataMember'])->name('edit-member');
    route::post('/foto-member-store-admin/{id}/post', [MemberController::class, 'storeMemberFotoAdmin'])->name('foto.member.store.admin');

    route::get('/member', [MemberController::class, 'index'])->name('member');
    route::post('/foto-member-store', [MemberController::class, 'storeMemberFoto'])->name('foto.member.store');
});


route::get('/', [LoginController::class, 'index'])->name('index');
route::post('/daftar-member', [MemberController::class, 'daftar'])->name('daftar-member');
route::get('login', [LoginController::class, 'index'])->name('login');
route::post('login-admin', [LoginController::class, 'loginAdmin'])->name('loginAdmin');
route::post('login-member', [LoginController::class, 'loginMember'])->name('loginMember');
route::post('logout', [LoginController::class, 'logout'])->name('logout');
