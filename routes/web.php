<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\SalutPendaftaranController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SalutPendaftaranController::class, 'landingPage'])->name('landing');
Route::get('/program-studi', [SalutPendaftaranController::class, 'programStudi'])->name('program-studi');
Route::get('/kurikulum-ut', [SalutPendaftaranController::class, 'kurikulum'])->name('kurikulum-ut');

// ========== ROUTE LOGIN USER (Calon Mahasiswa) ==========
Route::get('/login/user', [UserAuthController::class, 'showLoginForm'])->name('user.login');
Route::post('/login/user', [UserAuthController::class, 'login'])->name('user.login.submit');
Route::post('/register/user', [UserAuthController::class, 'register'])->name('user.register.submit');
Route::post('/logout/user', [UserAuthController::class, 'logout'])->name('user.logout');

// ========== ROUTE LUPA PASSWORD USER ==========
Route::get('/forgot-password', [UserAuthController::class, 'showForgotPassword'])->name('password.request');
Route::post('/forgot-password', [UserAuthController::class, 'resetPasswordCustom'])->name('password.reset.custom');


// ========== ROUTE LOGIN ADMIN ==========
Route::get('/login/admin', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login/admin', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/logout/admin', [AuthController::class, 'logout'])->name('admin.logout');

// ========== ROUTE YANG MEMBUTUHKAN LOGIN USER ==========
Route::middleware(['auth:web'])->group(function () {
    Route::get('/pendaftaran', [SalutPendaftaranController::class, 'index'])->name('pendaftaran');
    Route::post('/pendaftaran', [SalutPendaftaranController::class, 'store'])->name('pendaftaran.store');
    Route::get('/user', [UserAuthController::class, 'index'])->name('user.dashboard');
    Route::get('/user/tryout', [UserAuthController::class, 'tryout'])->name('user.tryout');
    Route::get('/user/profile', [UserAuthController::class, 'profile'])->name('user.profile');
    Route::get('/user/profile/edit', [UserAuthController::class, 'editProfile'])->name('user.profile.edit');
    Route::put('/user/profile/update', [UserAuthController::class, 'updateProfile'])->name('user.profile.update');
    Route::post('/user/resubmit', [UserAuthController::class, 'resubmit'])->name('user.resubmit');
});

// ========== ROUTE YANG MEMBUTUHKAN LOGIN ADMIN ==========
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
    Route::get('/admin/export/excel', [AdminController::class, 'exportExcel'])->name('admin.export.excel');
    Route::post('/admin/pendaftar/{id}/terima', [AdminController::class, 'terima'])->name('admin.terima');
    Route::post('/admin/pendaftar/{id}/tolak', [AdminController::class, 'tolak'])->name('admin.tolak');
    Route::get('/admin/diterima', [AdminController::class, 'diterimaIndex'])->name('admin.diterima');
    Route::get('/admin/ditolak', [AdminController::class, 'ditolakIndex'])->name('admin.ditolak');
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});