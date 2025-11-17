<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SalutPendaftaranController;
use Illuminate\Support\Facades\Route;

Route::get('/pendaftaran-calon-mahasiswa', function () {
    return view('pendaftaran-calon-mahasiswa');
});

Route::post('/pendaftaran-calon-mahasiswa', [SalutPendaftaranController::class, 'store']);

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.submit');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
    Route::get('/admin/export/pdf', [AdminController::class, 'exportPdf'])->name('admin.export.pdf');
    Route::get('/admin/export/excel', [AdminController::class, 'exportExcel'])->name('admin.export.excel');
});