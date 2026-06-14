<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\SalutPendaftaran;

class UserAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.user-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('user.dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function index()
    {
        return view('users.users-dashboard', [
            'title' => 'Dashboard User'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login/user');
    }

    public function showRegisterForm()
    {
        return view('auth.user-register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.login')->with('success', 'Akun berhasil dibuat! Silakan login.');
    }

    public function profile()
    {
        return view('users.users-profile');
    }

    // ========== NEW METHODS FOR EDIT PROFILE ==========

    public function editProfile()
    {
        $user = Auth::guard('web')->user();
        $pendaftaran = SalutPendaftaran::where('user_id', $user->id)->first();

        return view('users.users-profile-edit', compact('user', 'pendaftaran'));
    }

    public function updateProfile(Request $request)
    {
        $user = User::findOrFail(Auth::id());
        $pendaftaran = SalutPendaftaran::where('user_id', $user->id)->first();

        // Validasi data
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'current_password' => 'nullable|required_with:new_password',
            'new_password' => 'nullable|min:6|confirmed',
            'nama' => 'nullable|string|max:255',
            'nik' => 'nullable|string|max:20|unique:data-pendaftar,nik,' . ($pendaftaran?->id ?? 'NULL'),
            'tempat_lahir' => 'nullable|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'gender' => 'nullable|in:laki-laki,perempuan',
            'agama' => 'nullable|in:islam,kristen,katolik,hindu,buddha,konghucu',
            'status' => 'nullable|string|max:50',
            'no_hp' => 'nullable|string|max:15|unique:data-pendaftar,no_hp,' . ($pendaftaran?->id ?? 'NULL'),
            'no_hp_alternatif' => 'nullable|string|max:15',
            'nama_ibu_kandung' => 'nullable|string|max:255',
            'ukuran_almat' => 'nullable|string|max:10',
            'alamat' => 'nullable|string',
            'provinsi' => 'nullable|string|max:100',
            'kab_kota' => 'nullable|string|max:100',
            'kecamatan' => 'nullable|string|max:100',
            'desa_kelurahan' => 'nullable|string|max:100',
            'kode_pos' => 'nullable|string|max:10',
            'alamat_lain' => 'nullable|string',
            'alamat_pengirim_modul' => 'nullable|string',
            'jalur_program' => 'nullable|string|in:RPL,Non-RPL',
            'lokasi_ujian_provinsi' => 'nullable|string|max:100',
            'lokasi_ujian_kab_kota' => 'nullable|string|max:100',
            'file_foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'file_ktp' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
            'file_ijazah' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
            'file_transkrip' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
            'file_bukti_pembayaran' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
            'surat_pernyataan' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
            'file_cv' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
            'file_ss_pddikti' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
            'file_rpl_pembelajaran' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
            'file_rpl_administrasi' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
            'file_rpl_ekstrakulikuler' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
            'file_rpl_prestasi' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
            'surat_keterangan_pindah' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
        ];

        $customMessages = [
            // Name & Email
            'name.required' => 'Nama pengguna wajib diisi.',
            'name.max' => 'Nama pengguna maksimal 255 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar. Silakan gunakan email lain.',

            // Password
            'current_password.required_with' => 'Password saat ini wajib diisi untuk mengganti password.',
            'new_password.min' => 'Password baru minimal 6 karakter.',
            'new_password.confirmed' => 'Konfirmasi password baru tidak sesuai.',

            // Data Pribadi
            'nama.max' => 'Nama lengkap maksimal 255 karakter.',
            'nik.unique' => 'NIK sudah terdaftar. Silakan gunakan NIK lain.',
            'nik.max' => 'NIK maksimal 20 karakter.',
            'tempat_lahir.max' => 'Tempat lahir maksimal 100 karakter.',
            'tanggal_lahir.date' => 'Format tanggal lahir tidak valid.',
            'gender.in' => 'Jenis kelamin tidak valid.',
            'agama.in' => 'Agama tidak valid.',
            'status.max' => 'Status maksimal 50 karakter.',
            'no_hp.unique' => 'Nomor HP sudah terdaftar. Silakan gunakan nomor HP lain.',
            'no_hp.max' => 'Nomor HP maksimal 15 karakter.',
            'no_hp_alternatif.max' => 'Nomor HP alternatif maksimal 15 karakter.',
            'nama_ibu_kandung.max' => 'Nama ibu kandung maksimal 255 karakter.',
            'ukuran_almat.max' => 'Ukuran almamater maksimal 10 karakter.',

            // Alamat
            'provinsi.max' => 'Provinsi maksimal 100 karakter.',
            'kab_kota.max' => 'Kabupaten/Kota maksimal 100 karakter.',
            'kecamatan.max' => 'Kecamatan maksimal 100 karakter.',
            'desa_kelurahan.max' => 'Desa/Kelurahan maksimal 100 karakter.',
            'kode_pos.max' => 'Kode pos maksimal 10 karakter.',

            // Jalur Program
            'jalur_program.in' => 'Jalur program tidak valid.',
            'lokasi_ujian_provinsi.max' => 'Provinsi ujian maksimal 100 karakter.',
            'lokasi_ujian_kab_kota.max' => 'Kab/Kota ujian maksimal 100 karakter.',

            // File Uploads
            'file_foto.image' => 'File foto harus berupa gambar (JPG, JPEG, PNG).',
            'file_foto.mimes' => 'File foto harus berformat JPG, JPEG, atau PNG.',
            'file_foto.max' => 'Ukuran file foto terlalu besar. Maksimal 2MB.',
            'file_ktp.mimes' => 'File KTP harus berformat JPG, JPEG, PNG, atau PDF.',
            'file_ktp.max' => 'Ukuran file KTP terlalu besar. Maksimal 2MB.',
            'file_ijazah.mimes' => 'File Ijazah harus berformat PDF.',
            'file_ijazah.max' => 'Ukuran file Ijazah terlalu besar. Maksimal 2MB.',
            'file_transkrip.mimes' => 'File Transkrip harus berformat PDF.',
            'file_transkrip.max' => 'Ukuran file Transkrip terlalu besar. Maksimal 2MB.',
            'file_bukti_pembayaran.mimes' => 'File Bukti Pembayaran harus berformat JPG, JPEG, atau PNG.',
            'file_bukti_pembayaran.max' => 'Ukuran file Bukti Pembayaran terlalu besar. Maksimal 2MB.',
            'surat_pernyataan.mimes' => 'File Surat Pernyataan harus berformat PDF.',
            'surat_pernyataan.max' => 'Ukuran file Surat Pernyataan terlalu besar. Maksimal 2MB.',
            'file_cv.mimes' => 'File CV harus berformat PDF.',
            'file_cv.max' => 'Ukuran file CV terlalu besar. Maksimal 2MB.',
            'file_ss_pddikti.mimes' => 'File SS PDDIKTI harus berformat JPG, JPEG, atau PNG.',
            'file_ss_pddikti.max' => 'Ukuran file SS PDDIKTI terlalu besar. Maksimal 2MB.',
            'file_rpl_pembelajaran.mimes' => 'File RPL Pembelajaran harus berformat PDF.',
            'file_rpl_pembelajaran.max' => 'Ukuran file RPL Pembelajaran terlalu besar. Maksimal 2MB.',
            'file_rpl_administrasi.mimes' => 'File RPL Administrasi harus berformat PDF.',
            'file_rpl_administrasi.max' => 'Ukuran file RPL Administrasi terlalu besar. Maksimal 2MB.',
            'file_rpl_ekstrakulikuler.mimes' => 'File RPL Ekstrakurikuler harus berformat PDF.',
            'file_rpl_ekstrakulikuler.max' => 'Ukuran file RPL Ekstrakurikuler terlalu besar. Maksimal 2MB.',
            'file_rpl_prestasi.mimes' => 'File RPL Prestasi harus berformat PDF.',
            'file_rpl_prestasi.max' => 'Ukuran file RPL Prestasi terlalu besar. Maksimal 2MB.',
            'surat_keterangan_pindah.mimes' => 'File Surat Keterangan Pindah harus berformat PDF.',
            'surat_keterangan_pindah.max' => 'Ukuran file Surat Keterangan Pindah terlalu besar. Maksimal 2MB.',
        ];

        $request->validate($rules, $customMessages);

        // Jika user pilih "Ya" (kirim ke alamat KTP), maka alamat_lain dihapus/dikosongkan
        if ($request->alamat_pengirim_modul == 'ya') {
            $request->merge(['alamat_lain' => null]);
        }

        // Update user account
        if ($request->filled('current_password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Password saat ini salah']);
            }

            // Validasi password baru
            if ($request->new_password != $request->new_password_confirmation) {
                return back()->withErrors(['new_password' => 'Konfirmasi password baru tidak sesuai']);
            }

            $user->password = Hash::make($request->new_password);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        // Prepare data for pendaftaran
        $pendaftaranData = [
            'nama' => $request->nama ?? '',
            'nik' => $request->nik ?? '',
            'tempat_lahir' => $request->tempat_lahir ?? '',
            'tanggal_lahir' => $request->tanggal_lahir ?? null,
            'gender' => $request->gender ?? 'laki-laki',
            'agama' => strtolower($request->agama ?? 'islam'),
            'status' => $request->status ?? 'Belum Menikah',
            'no_hp' => $request->no_hp ?? '',
            'no_hp_alternatif' => $request->no_hp_alternatif ?? '',
            'nama_ibu_kandung' => $request->nama_ibu_kandung ?? '',
            'ukuran_almat' => $request->ukuran_almat ?? null,
            'alamat' => $request->alamat ?? '',
            'provinsi' => $request->provinsi ?? '',
            'kab_kota' => $request->kab_kota ?? '',
            'kecamatan' => $request->kecamatan ?? '',
            'desa_kelurahan' => $request->desa_kelurahan ?? '',
            'kode_pos' => $request->kode_pos ?? '',
            'alamat_lain' => $request->alamat_lain ?? '',
            'alamat_pengirim_modul' => $request->alamat_pengirim_modul ?? '',
            'jalur_program' => $request->jalur_program ?? 'Non-RPL',
            'no_ijazah' => $request->no_ijazah ?? '',
            'ipk' => $request->ipk ?? null,
            'lokasi_ujian_provinsi' => $request->lokasi_ujian_provinsi ?? '',
            'lokasi_ujian_kab_kota' => $request->lokasi_ujian_kab_kota ?? '',
        ];

        // Cek perubahan jalur program dari RPL ke Non-RPL
        $oldJalurProgram = $pendaftaran ? $pendaftaran->jalur_program : null;
        $newJalurProgram = $request->jalur_program;

        // Jika berubah dari RPL ke Non-RPL, hapus file-file khusus RPL
        if ($oldJalurProgram == 'RPL' && $newJalurProgram == 'Non-RPL') {
            $rplFiles = [
                'file_ss_pddikti',
                'file_cv',
                'file_rpl_pembelajaran',
                'file_rpl_administrasi',
                'file_rpl_ekstrakulikuler',
                'file_rpl_prestasi',
                'surat_keterangan_pindah'
            ];

            foreach ($rplFiles as $fileField) {
                if ($pendaftaran && $pendaftaran->$fileField) {
                    Storage::disk('public')->delete($pendaftaran->$fileField);
                    $pendaftaranData[$fileField] = null;
                }
            }

            $pendaftaranData['ipk'] = null;
        }

        // Handle file uploads
        $fileFields = [
            'file_foto',
            'file_ktp',
            'file_ijazah',
            'file_transkrip',
            'file_bukti_pembayaran',
            'surat_pernyataan',
            'file_cv',
            'file_ss_pddikti',
            'file_rpl_pembelajaran',
            'file_rpl_administrasi',
            'file_rpl_ekstrakulikuler',
            'file_rpl_prestasi',
            'surat_keterangan_pindah'
        ];

        foreach ($fileFields as $field) {
    if ($request->hasFile($field)) {
        // Hapus file lama jika ada
        if ($pendaftaran && $pendaftaran->$field) {
            $oldFilePath = public_path($pendaftaran->$field);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }

        // Upload file baru
        $file = $request->file($field);
        $filename = time() . '_' . uniqid() . '_' . $file->getClientOriginalName();
        
        // Tentukan path tujuan (OTOMATIS BIKIN FOLDER)
        $uploadPath = public_path('uploads/pendaftar');
        
        // BIKIN FOLDER SECARA OTOMATIS KALO BELUM ADA
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);  // recursive = true
        }
        
        // Pindahin file
        $file->move($uploadPath, $filename);
        
        // Simpan path relatif ke database
        $pendaftaranData[$field] = 'uploads/pendaftar/' . $filename;
    }
}

        // Update or create pendaftaran
        if ($pendaftaran) {
            $pendaftaran->update($pendaftaranData);
        } else {
            $pendaftaranData['user_id'] = $user->id;
            SalutPendaftaran::create($pendaftaranData);
        }

        return redirect()->route('user.profile')->with('success', 'Profil berhasil diperbarui!');
    }

    public function tryout()
    {
        return view('users.users-tryout');
    }
}
