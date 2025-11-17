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
        return view('pendaftaran-calon-mahasiswa', [
            'existingCvUrl' => 'files/Formulir_Daftar_Riwayat_Hidup_Pemohon_0.docx'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|in:islam, kristen, katolik, hindu, buddha, konghucu',
            'gender' => 'required|string',
            'status' => 'required|string',
            'nik' => 'required|string|size:16',
            'provinsi' => 'required|string|max:255',
            'kab_kota' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'desa_kelurahan' => 'required|string|max:255',
            'kode_pos' => 'required|string|max:10',
            'alamat' => 'required|string|max:500',
            'alamat_lain' => 'nullable|string|max:500',
            'alamat_pengirim_modul' => ['required', Rule::in(['ya', 'tidak'])],
            'ukuran_almat' => 'required|string|max:10',
            'nama_ibu_kandung' => 'required|string|max:255',
            'no_hp' => 'required|string|max:16',
            'no_hp_alternatif' => 'required|string|max:16',
            'email' => 'required|email|max:255',
            'jalur_program' => ['required', Rule::in(['RPL', 'Non-RPL'])],
            'file_ijazah' => 'required|file|mimes:pdf|max:2048',
            'no_ijazah' => 'required|string|max:255',
            'ipk'=>'numeric|nullable|min:2.00|max:4.00',
            'file_bukti_pembayaran' => 'required|file|mimes:jpg,jpeg,png|max:2048',
            'surat_pernyataan' => 'required|file|mimes:pdf|max:2048',
            'form_tanda_tangan' => 'required|file|mimes:pdf|max:2048',
            'file_foto' => 'required|file|mimes:jpg,jpeg,png|max:2048',
            'file_ktp' => 'required|file|mimes:jpg,jpeg,png|max:2048',
            'file_ss_pddikti' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'file_transkrip' => 'nullable|file|mimes:pdf|max:2048',
            'file_rpl_pembelajaran' => 'nullable|file|mimes:pdf|max:2048',
            'file_rpl_administrasi' => 'nullable|file|mimes:pdf|max:2048',
            'file_rpl_ekstrakulikuler' => 'nullable|file|mimes:pdf|max:2048',
            'file_rpl_prestasi' => 'nullable|file|mimes:pdf|max:2048',
            'surat_keterangan_pindah' => 'nullable|file|mimes:pdf|max:2048',
            'file_cv' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        if ($validatedData['alamat_pengirim_modul'] === 'ya') {
            $validatedData['alamat_lain'] = null;
        }

        $fileFields = [
            'file_ijazah', 'file_bukti_pembayaran', 'surat_pernyataan', 'form_tanda_tangan',
            'file_foto', 'file_ktp', 'file_ss_pddikti', 'file_transkrip', 'file_rpl_pembelajaran',
            'file_rpl_administrasi', 'file_rpl_ekstrakulikuler', 'file_rpl_prestasi',
            'surat_keterangan_pindah', 'file_cv'
        ];

        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $validatedData[$field] = $request->file($field)->store('pendaftar', 'public');
            }
        }

        SalutPendaftaran::create($validatedData);

        return redirect('/pendaftaran-calon-mahasiswa')->with('success', 'Pendaftaran berhasil dikirim!');

    }
}