<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SalutPendaftaranController;
use Illuminate\Support\Facades\Route;

Route::get('/pendaftaran-calon-mahasiswa', function () {
    return view('pendaftaran-calon-mahasiswa');
});
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
Route::delete('/admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
Route::get('/admin/export/pdf', [AdminController::class, 'exportPdf'])->name('admin.export.pdf');
Route::get('/admin/export/excel', [AdminController::class, 'exportExcel'])->name('admin.export.excel');

Route::post('/pendaftaran-calon-mahasiswa', [SalutPendaftaranController::class, 'store']);