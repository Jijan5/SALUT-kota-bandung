<?php

namespace App\Http\Controllers;

use App\Models\SalutPendaftaran;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SalutPendaftaranController extends Controller
{
    public function index()
    {
        return view('pendaftaran-calon-mahasiswa');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|in:islam, kristen, katolik, hindu, budha, konghucu',
            'gender' => 'required|string',
            'status' => 'required|string',
            'nik' => 'required|string|size:16',
            'provinsi' => 'required|string|max:255',
            'kab_kota' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'desa_kelurahan' => 'required|string|max:255',
            'kode_pos' => 'required|string|max:10',
            'alamat' => 'required|string|max:500',
            'alamat_pengirim_modul' => ['required', Rule::in(['ya', 'tidak'])],
            'ukuran_almat' => 'required|string|max:10',
            'nama_ibu_kandung' => 'required|string|max:255',
            'no_hp' => 'required|string|max:16',
            'no_hp_alternatif' => 'required|string|max:16',
            'email' => 'required|email|max:255',
            'jalur_program' => ['required', Rule::in(['RPL', 'Non-RPL'])],
        ]);
        return redirect('/pendaftaran-calon-mahasiswa')->with('success', 'Pendaftaran berhasil dikirim!');
    }
}