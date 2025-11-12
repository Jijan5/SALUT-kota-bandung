<?php

use Illuminate\Support\Facades\Route;

Route::get('/pendaftaran-calon-mahasiswa', function () {
    return view('pendaftaran-calon-mahasiswa');
});