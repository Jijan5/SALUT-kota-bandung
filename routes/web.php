<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SalutPendaftaranController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SalutPendaftaranController::class, 'landingPage'])->name('landing');
Route::get('/program-studi', [SalutPendaftaranController::class, 'programStudi'])->name('program-studi');
Route::get('/kurikulum-ut', [SalutPendaftaranController::class, 'kurikulum'])->name('kurikulum-ut');

Route::get('/pendaftaran', [SalutPendaftaranController::class, 'index'])->name('pendaftaran');
Route::post('/pendaftaran', [SalutPendaftaranController::class, 'store'])->name('pendaftaran.store');

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.submit');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
    Route::get('/admin/export/pdf', [AdminController::class, 'exportPdf'])->name('admin.export.pdf');
    Route::get('/admin/export/excel', [AdminController::class, 'exportExcel'])->name('admin.export.excel');
    Route::post('/admin/pendaftar/{id}/terima', [AdminController::class, 'terima'])->name('admin.terima');
    Route::get('/admin/diterima', [AdminController::class, 'diterimaIndex'])->name('admin.diterima');
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});