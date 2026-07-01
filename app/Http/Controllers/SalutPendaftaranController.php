<?php

namespace App\Http\Controllers;

use App\Models\SalutPendaftaran;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;

class SalutPendaftaranController extends Controller
{
    public function kurikulum()
    {
        return view('kurikulum-ut');
    }

    public function programStudi()
    {
        return view('program-studi');
    }

    public function landingPage()
    {
        return view('landing-page');
    }

    public function index()
    {
        // CEK APAKAH USER SUDAH LOGIN (GUARD WEB)
        if (!Auth::guard('web')->check()) {
            return redirect()->route('user.login')->with('error', 'Silakan login terlebih dahulu untuk mengakses formulir pendaftaran.');
        }

        // CEK APAKAH USER SUDAH PUNYA DATA PENDAFTARAN
        $existingData = SalutPendaftaran::where('user_id', Auth::guard('web')->id())->first();

        if ($existingData) {
            return redirect('/')->with('warning', 'Anda sudah melakukan pendaftaran. Tidak dapat mendaftar lagi.');
        }

        return view('pendaftaran-calon-mahasiswa', [
            'existingCvUrl' => 'files/Formulir_Daftar_Riwayat_Hidup_Pemohon_0.docx'
        ]);
    }

    public function store(Request $request)
    {
        // CEK LOGIN (GUARD WEB)
        if (!Auth::guard('web')->check()) {
            return redirect()->route('user.login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // CEK APAKAH USER SUDAH PUNYA DATA PENDAFTARAN
        $existingData = SalutPendaftaran::where('user_id', Auth::guard('web')->id())->first();
        if ($existingData) {
            return redirect('/')->with('warning', 'Anda sudah melakukan pendaftaran. Tidak dapat mendaftar lagi.');
        }

        // Custom error messages dalam BAHASA INDONESIA
        $customMessages = [
            'required' => ':attribute wajib diisi.',
            'nik.unique' => 'NIK sudah terdaftar. Silakan gunakan NIK lain.',
            'no_hp.unique' => 'Nomor HP sudah terdaftar. Silakan gunakan nomor HP lain.',
            'nik.size' => 'NIK harus terdiri dari 16 digit angka.',
            'no_hp.max' => 'Nomor HP maksimal 16 digit.',
            'kode_pos.max' => 'Kode Pos maksimal 10 karakter.',
            'agama.in' => 'Agama yang dipilih tidak valid.',
            'jalur_program.in' => 'Jalur program yang dipilih tidak valid.',
            'alamat_pengirim_modul.in' => 'Pilihan alamat pengirim modul tidak valid.',
            'file_ijazah.mimes' => 'File Ijazah harus berformat PDF.',
            'file_ijazah.max' => 'Ukuran file Ijazah maksimal 25MB.',
            'file_bukti_pembayaran.mimes' => 'File Bukti Pembayaran harus berformat PDF.',
            'file_bukti_pembayaran.max' => 'Ukuran file Bukti Pembayaran maksimal 25MB.',
            'file_foto.image' => 'File Foto harus berupa gambar.',
            'file_foto.mimes' => 'File Foto harus berformat JPG, JPEG, atau PNG.',
            'file_foto.max' => 'Ukuran file Foto maksimal 25MB.',
            'file_ktp.image' => 'File KTP harus berupa gambar.',
            'file_ktp.mimes' => 'File KTP harus berformat JPG, JPEG, atau PNG.',
            'file_ktp.max' => 'Ukuran file KTP maksimal 25MB.',
            'surat_pernyataan.mimes' => 'File Surat Pernyataan harus berformat PDF.',
            'surat_pernyataan.max' => 'Ukuran file Surat Pernyataan maksimal 25MB.',
            'file_ss_pddikti.mimes' => 'File Screenshot PDDIKTI harus berformat JPG, JPEG, PNG, atau PDF.',
            'file_transkrip.mimes' => 'File Transkrip Nilai harus berformat PDF.',
            'file_rpl_pembelajaran.mimes' => 'File RPL Pembelajaran harus berformat PDF.',
            'file_rpl_administrasi.mimes' => 'File RPL Administrasi harus berformat PDF.',
            'file_rpl_ekstrakulikuler.mimes' => 'File RPL Ekstrakurikuler harus berformat PDF.',
            'file_rpl_prestasi.mimes' => 'File RPL Prestasi harus berformat PDF.',
            'surat_keterangan_pindah.mimes' => 'Surat Keterangan Pindah harus berformat PDF.',
            'file_cv.mimes' => 'File CV harus berformat PDF.',
            'ipk.numeric' => 'IPK harus berupa angka.',
            'ipk.min' => 'IPK minimal 2.00.',
            'ipk.max' => 'IPK maksimal 4.00.',
            'tanggal_lahir.date' => 'Format tanggal lahir tidak valid.',
        ];

        // Nama atribut dalam BAHASA INDONESIA
        $attributeNames = [
            'nama' => 'Nama lengkap',
            'tempat_lahir' => 'Tempat lahir',
            'tanggal_lahir' => 'Tanggal lahir',
            'agama' => 'Agama',
            'gender' => 'Jenis kelamin',
            'status' => 'Status perkawinan',
            'nik' => 'NIK',
            'provinsi' => 'Provinsi',
            'kab_kota' => 'Kabupaten/Kota',
            'kecamatan' => 'Kecamatan',
            'desa_kelurahan' => 'Desa/Kelurahan',
            'kode_pos' => 'Kode pos',
            'alamat' => 'Alamat',
            'alamat_lain' => 'Alamat lain',
            'lokasi_ujian_provinsi' => 'Lokasi ujian provinsi',
            'lokasi_ujian_kab_kota' => 'Lokasi ujian kab/kota',
            'alamat_pengirim_modul' => 'Alamat pengirim modul',
            'ukuran_almat' => 'Ukuran almamater',
            'nama_ibu_kandung' => 'Nama ibu kandung',
            'no_hp' => 'Nomor HP',
            'no_hp_alternatif' => 'Nomor HP alternatif',
            'jalur_program' => 'Jalur program',
            'file_ijazah' => 'File ijazah',
            'no_ijazah' => 'Nomor ijazah',
            'ipk' => 'IPK',
            'file_bukti_pembayaran' => 'File bukti pembayaran',
            'surat_pernyataan' => 'Surat pernyataan',
            'file_foto' => 'File foto',
            'file_ktp' => 'File KTP',
            'file_ss_pddikti' => 'File screenshot PDDIKTI',
            'file_transkrip' => 'File transkrip nilai',
            'file_rpl_pembelajaran' => 'File RPL pembelajaran',
            'file_rpl_administrasi' => 'File RPL administrasi',
            'file_rpl_ekstrakulikuler' => 'File RPL ekstrakurikuler',
            'file_rpl_prestasi' => 'File RPL prestasi',
            'surat_keterangan_pindah' => 'Surat keterangan pindah',
            'file_cv' => 'File CV',
        ];

        // VALIDASI - HAPUS EMAIL
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|in:islam,kristen,katolik,hindu,buddha,konghucu',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'status' => 'required|in:Kawin,Belum Kawin,Cerai Hidup,Cerai Mati',
            'nik' => 'required|string|size:16|unique:data-pendaftar,nik',
            'provinsi' => 'required|string|max:255',
            'kab_kota' => 'nullable|string|max:255',
            'kecamatan' => 'nullable|string|max:255',
            'desa_kelurahan' => 'nullable|string|max:255',
            'kode_pos' => 'required|string|max:10',
            'alamat' => 'required|string|max:500',
            'alamat_lain' => 'nullable|string|max:500',
            'lokasi_ujian_provinsi' => 'required|string|max:255',
            'lokasi_ujian_kab_kota' => 'nullable|string|max:255',
            'alamat_pengirim_modul' => ['required', Rule::in(['ya', 'tidak'])],
            'ukuran_almat' => 'nullable|string|max:10',
            'nama_ibu_kandung' => 'required|string|max:255',
            'no_hp' => 'required|string|max:16|unique:data-pendaftar,no_hp',
            'no_hp_alternatif' => 'required|string|max:16',
            // EMAIL DIHAPUS DARI VALIDASI
            'jalur_program' => ['required', Rule::in(['RPL', 'Non-RPL'])],
            'file_ijazah' => 'required|file|mimes:pdf|max:25600',
            'no_ijazah' => 'required|string|max:255',
            'ipk' => 'numeric|nullable|min:2.00|max:4.00',
            'file_bukti_pembayaran' => 'required|file|mimes:pdf,jpg,jpeg,png|max:25600',
            'surat_pernyataan' => 'required|file|mimes:pdf|max:25600',
            'file_foto' => 'required|image|mimes:jpeg,png,jpg|max:25600',
            'file_ktp' => 'required|image|mimes:jpeg,png,jpg|max:25600',
            'file_ss_pddikti' => 'nullable|image|mimes:jpg,jpeg,png|max:25600',
            'file_transkrip' => 'nullable|file|mimes:pdf|max:25600',
            'file_rpl_pembelajaran' => 'nullable|file|mimes:pdf|max:25600',
            'file_rpl_administrasi' => 'nullable|file|mimes:pdf|max:25600',
            'file_rpl_ekstrakulikuler' => 'nullable|file|mimes:pdf|max:25600',
            'file_rpl_prestasi' => 'nullable|file|mimes:pdf|max:25600',
            'surat_keterangan_pindah' => 'nullable|file|mimes:pdf|max:25600',
            'file_cv' => 'nullable|file|mimes:pdf|max:25600',
        ], $customMessages, $attributeNames);

        if ($validatedData['alamat_pengirim_modul'] === 'ya') {
            $validatedData['alamat_lain'] = null;
        }

        $fileFields = [
            'file_ijazah',
            'file_bukti_pembayaran',
            'surat_pernyataan',
            'file_foto',
            'file_ktp',
            'file_ss_pddikti',
            'file_transkrip',
            'file_rpl_pembelajaran',
            'file_rpl_administrasi',
            'file_rpl_ekstrakulikuler',
            'file_rpl_prestasi',
            'surat_keterangan_pindah',
            'file_cv'
        ];

        //test

        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $filename = time() . '_' . uniqid() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/pendaftar'), $filename);
                $validatedData[$field] = 'pendaftar/' . $filename;
            }
        }

        // TAMBAHKAN user_id DARI USER YANG LOGIN
        $validatedData['user_id'] = Auth::guard('web')->id();

        SalutPendaftaran::create($validatedData);

        return redirect('/user/profile')->with('success', 'Selamat! Pendaftaran Anda berhasil dikirim. Data sedang dalam proses verifikasi.');
    }
}
