<?php

use App\Http\Controllers\SalutPendaftaranController;
use Illuminate\Support\Facades\Route;

Route::get('/pendaftaran-calon-mahasiswa', function () {
    return view('pendaftaran-calon-mahasiswa');
});

Route::post('/pendaftaran-calon-mahasiswa', [SalutPendaftaranController::class, 'store']);