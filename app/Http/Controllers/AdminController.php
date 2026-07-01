<?php

namespace App\Http\Controllers;

use App\export\ExportPendaftaran;
use App\Models\SalutPendaftaran;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{

    public function admin()
    {
        $pendaftar = SalutPendaftaran::all();

        return view('admin.admin-salut', ['data-pendaftar' => $pendaftar]);
    }

    public function exportCSV()
    {
        $headers = [
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
            'Content-type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename=data_pendaftar.csv',
            'Expires'             => '0',
            'Pragma'              => 'public'
        ];

        $columns = [
            'nama', 'tempat_lahir', 'tanggal_lahir', 'agama', 'gender', 'status', 'nik', 'provinsi', 
            'kab_kota', 'kecamatan', 'desa_kelurahan', 'kode_pos', 'alamat', 'alamat_lain', 
            'lokasi_ujian_provinsi', 'lokasi_ujian_kab_kota', 'alamat_pengirim_modul', 'ukuran_almat', 
            'nama_ibu_kandung', 'no_hp', 'no_hp_alternatif', 'email', 'jalur_program', 'file_ijazah', 
            'no_ijazah', 'ipk', 'file_bukti_pembayaran', 'surat_pernyataan', 'file_foto', 'file_ktp', 
            'file_ss_pddikti', 'file_transkrip', 'file_rpl_pembelajaran', 'file_rpl_administrasi', 
            'file_rpl_ekstrakulikuler', 'file_rpl_prestasi', 'surat_keterangan_pindah', 'file_cv'
        ];

        $callback = function() use($columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            SalutPendaftaran::chunk(100, function($pendaftar) use($file, $columns) {
                foreach ($pendaftar as $p) {
                    $row = [];
                    foreach ($columns as $col) {
                        $row[] = $p->{$col};
                    }
                    fputcsv($file, $row);
                }
            });

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

        $pendaftar = SalutPendaftaran::query()
            ->where('status_pendaftaran', 'pending')
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('nama', 'like', "%{$search}%")
                        ->orWhere('nik', 'like', "%{$search}%")
                        ->orWhere('no_hp', 'like', "%{$search}%")
                        ->orWhere('no_hp_alternatif', 'like', "%{$search}%")
                        ->orWhere('jalur_program', 'like', "%{$search}%")
                        ->orWhere('no_ijazah', 'like', "%{$search}%")
                        ->orWhereHas('user', function ($q) use ($search) {
                            $q->where('email', 'like', "%{$search}%");
                        });
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.admin-salut', ['datapendaftar' => $pendaftar]);
    }

    public function dashboard()
    {
        $totalPendaftar = SalutPendaftaran::count();
        $jumlahDiterima = SalutPendaftaran::where('status_pendaftaran', 'diterima')->count();
        $jumlahPending  = SalutPendaftaran::where('status_pendaftaran', 'pending')->count();
        $jumlahDitolak  = SalutPendaftaran::where('status_pendaftaran', 'ditolak')->count();

        return view('admin.admin-dashboard', [
            'totalPendaftar' => $totalPendaftar,
            'jumlahDiterima' => $jumlahDiterima,
            'jumlahPending'  => $jumlahPending,
            'jumlahDitolak'  => $jumlahDitolak,
        ]);
    }

    public function diterimaIndex(Request $request)
    {
        $search = $request->input('search');

        $pendaftarDiterima = SalutPendaftaran::query()
            ->where('status_pendaftaran', 'diterima')
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('nama', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->orderBy('updated_at', 'desc') // Urutkan berdasarkan kapan mereka diterima
            ->paginate(10);

        return view('admin.admin-diterima', ['datapendaftar' => $pendaftarDiterima]);
    }

    public function ditolakIndex(Request $request)
    {
        $search = $request->input('search');

        $pendaftarDitolak = SalutPendaftaran::query()
            ->where('status_pendaftaran', 'ditolak')
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('nama', 'like', "%{$search}%")
                        ->orWhereHas('user', function ($q) use ($search) {
                            $q->where('email', 'like', "%{$search}%");
                        });
                });
            })
            ->orderBy('updated_at', 'desc')
            ->paginate(10);

        return view('admin.admin-ditolak', ['datapendaftar' => $pendaftarDitolak]);
    }

    /**
     * Mengubah status pendaftar menjadi 'diterima'.
     */
    public function terima(int $id)
    {
        $pendaftar = SalutPendaftaran::findOrFail($id);
        $pendaftar->status_pendaftaran = 'diterima';
        $pendaftar->alasan_penolakan   = null;
        $pendaftar->file_ditolak       = null;
        $pendaftar->save();

        return redirect()->route('admin.index')->with('success', 'Siswa telah diterima dan dipindahkan ke halaman Siswa Diterima.');
    }

    /**
     * Menolak pendaftar dengan alasan & daftar file yang perlu diperbaiki.
     */
    public function tolak(int $id, Request $request)
    {
        $request->validate([
            'alasan_penolakan' => 'required|string|max:2000',
            'file_ditolak'     => 'nullable|array',
            'file_ditolak.*'   => 'string',
        ]);

        $pendaftar = SalutPendaftaran::findOrFail($id);
        $pendaftar->status_pendaftaran = 'ditolak';
        $pendaftar->alasan_penolakan   = $request->alasan_penolakan;
        $pendaftar->file_ditolak       = $request->file_ditolak ?? [];
        $pendaftar->save();

        return redirect()->route('admin.index')->with('success', 'Pendaftar telah ditolak. Notifikasi penolakan sudah tersimpan.');
    }

    public function edit(int $id)
    {
        $data = SalutPendaftaran::with('user')->findOrFail($id);
        return view('admin.edit', compact('data'));
    }

    public function update(int $id, Request $request)
    {
        $record = SalutPendaftaran::findOrFail($id);

        // Cari user berdasarkan user_id (relasi sudah ada)
        $user = $record->user; // menggunakan relasi

        // Validasi data (email tetap ada validasinya)
        $validated = $request->validate([
            'nama' => 'nullable|string|max:255',
            'nik' => 'nullable|string|max:20',
            'tempat_lahir' => 'nullable|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'gender' => 'nullable|in:laki-laki,perempuan',
            'agama' => 'nullable|in:islam,kristen,katolik,hindu,buddha,konghucu',
            'status' => 'nullable|string|max:50',
            // Email divalidasi UNIQUE ke tabel users, tapi TIDAK akan masuk ke $validated untuk data-pendaftar
            'email' => 'nullable|email|max:255|unique:users,email,' . ($user->id ?? 'NULL'),
            'no_hp' => 'nullable|string|max:15',
            'no_hp_alternatif' => 'nullable|string|max:15',
            'nama_ibu_kandung' => 'nullable|string|max:255',
            'no_ijazah' => 'nullable|string|max:50',
            'ipk' => 'nullable|numeric|min:0|max:4',
            'provinsi' => 'nullable|string|max:100',
            'kab_kota' => 'nullable|string|max:100',
            'kecamatan' => 'nullable|string|max:100',
            'desa_kelurahan' => 'nullable|string|max:100',
            'kode_pos' => 'nullable|string|max:10',
            'alamat' => 'nullable|string',
            'alamat_lain' => 'nullable|string',
            'alamat_pengirim_modul' => 'nullable|in:ya,tidak',
            'lokasi_ujian_provinsi' => 'nullable|string|max:100',
            'lokasi_ujian_kab_kota' => 'nullable|string|max:100',
            'ukuran_almat' => 'nullable|string|max:10',
            'file_foto' => 'nullable|file|mimes:jpg,jpeg,png|max:25600',
            'file_ktp' => 'nullable|file|mimes:pdf|max:25600',
            'file_ijazah' => 'nullable|file|mimes:pdf|max:25600',
            'file_transkrip' => 'nullable|file|mimes:pdf|max:25600',
            'file_bukti_pembayaran' => 'nullable|file|mimes:jpg,jpeg,png|max:25600',
            'surat_pernyataan' => 'nullable|file|mimes:pdf|max:25600',
            'file_ss_pddikti' => 'nullable|file|mimes:jpg,jpeg,png|max:25600',
            'file_cv' => 'nullable|file|mimes:pdf|max:25600',
            'file_rpl_pembelajaran' => 'nullable|file|mimes:pdf|max:25600',
            'file_rpl_administrasi' => 'nullable|file|mimes:pdf|max:25600',
            'file_rpl_ekstrakulikuler' => 'nullable|file|mimes:pdf|max:25600',
            'file_rpl_prestasi' => 'nullable|file|mimes:pdf|max:25600',
            'surat_keterangan_pindah' => 'nullable|file|mimes:pdf|max:25600',
            'reset_password' => 'nullable|string|min:6',
        ]);

        // HAPUS email dan reset_password dari $validated karena tidak ada di fillable data-pendaftar
        $emailToUpdate = $request->email;
        $passwordToUpdate = $request->reset_password;
        unset($validated['email']);
        unset($validated['reset_password']);

        // Proses upload file baru jika ada
        $fileFields = [
            'file_foto',
            'file_ktp',
            'file_ijazah',
            'file_transkrip',
            'file_bukti_pembayaran',
            'surat_pernyataan',
            'file_ss_pddikti',
            'file_cv',
            'file_rpl_pembelajaran',
            'file_rpl_administrasi',
            'file_rpl_ekstrakulikuler',
            'file_rpl_prestasi',
            'surat_keterangan_pindah'
        ];

        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                if ($record->$field) {
                    $filePath = public_path('uploads/' . $record->$field);
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                }
                $file = $request->file($field);
                $filename = time() . '_' . uniqid() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $file->getClientOriginalName());
                $file->move(public_path('uploads/pendaftar'), $filename);
                $validated[$field] = 'pendaftar/' . $filename;
            }
        }

        // Update data pendaftaran (tanpa email)
        $record->update($validated);

        // Update email dan password di tabel users jika ada perubahan dan user ditemukan
        if ($user) {
            $userModified = false;
            if ($emailToUpdate && $user->email !== $emailToUpdate) {
                $user->email = $emailToUpdate;
                $userModified = true;
            }
            if ($passwordToUpdate) {
                $user->password = \Illuminate\Support\Facades\Hash::make($passwordToUpdate);
                $userModified = true;
            }
            
            if ($userModified) {
                $user->save();
            }
        }

        // Jalur program tidak bisa diubah, sehingga logika penghapusan file saat berganti jalur dihapus.

        return redirect()->route('admin.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function delete(int $id)
    {
        $data = SalutPendaftaran::findOrFail($id);

        // Dapatkan user_id sebelum menghapus data pendaftaran
        $userId = $data->user_id;

        // Daftar field yang menyimpan file
        $fileFields = [
            'file_foto', 'file_ktp', 'file_ijazah', 'file_transkrip', 'file_bukti_pembayaran',
            'surat_pernyataan', 'file_ss_pddikti', 'file_rpl_pembelajaran', 'file_rpl_administrasi',
            'file_rpl_ekstrakulikuler', 'file_rpl_prestasi', 'surat_keterangan_pindah', 'file_cv'
        ];

        foreach ($fileFields as $field) {
            if ($data->$field) {
                $filePath = public_path('uploads/' . $data->$field);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
        }

        // Hapus data pendaftaran dari database
        $data->delete();

        return back()->with('success', 'Data pendaftar beserta akun user dan semua file pendukung berhasil dihapus!');
    }
    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids');
        if (empty($ids)) {
            return redirect()->back()->with('error', 'Tidak ada data yang dipilih untuk dihapus.');
        }

        $pendaftars = SalutPendaftaran::whereIn('id', $ids)->get();

        $fileFields = [
            'file_foto', 'file_ktp', 'file_ijazah', 'file_transkrip', 'file_bukti_pembayaran',
            'surat_pernyataan', 'file_ss_pddikti', 'file_rpl_pembelajaran', 'file_rpl_administrasi',
            'file_rpl_ekstrakulikuler', 'file_rpl_prestasi', 'surat_keterangan_pindah', 'file_cv'
        ];

        foreach ($pendaftars as $data) {
            $userId = $data->user_id;

            foreach ($fileFields as $field) {
                if ($data->$field) {
                    $filePath = public_path('uploads/' . $data->$field);
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                }
            }
            $data->delete();

            if ($userId) {
                $user = \App\Models\User::find($userId);
                if ($user) {
                    $user->delete();
                }
            }
        }

        return redirect()->back()->with('success', 'Data pendaftar yang dipilih berhasil dihapus!');
    }

    public function downloadZip($id)
    {
        $pendaftar = SalutPendaftaran::findOrFail($id);
        
        $zip = new \ZipArchive();
        $safeName = preg_replace('/[^a-zA-Z0-9_-]/', '_', str_replace(' ', '_', $pendaftar->nama));
        $zipFileName = 'Berkas_' . $safeName . '_' . time() . '.zip';
        $zipFilePath = public_path('uploads/' . $zipFileName);

        if ($zip->open($zipFilePath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === TRUE) {
            
            $fileFields = [
                'file_foto' => 'Foto_Profil',
                'file_ktp' => 'KTP',
                'file_ijazah' => 'Ijazah',
                'file_transkrip' => 'Transkrip_Nilai',
                'file_bukti_pembayaran' => 'Bukti_Pembayaran',
                'surat_pernyataan' => 'Surat_Pernyataan',
                'file_ss_pddikti' => 'SS_PDDIKTI',
                'file_cv' => 'Curriculum_Vitae',
                'file_rpl_pembelajaran' => 'RPL_Daftar_Mata_Kuliah',
                'file_rpl_administrasi' => 'RPL_Sertifikat_Pelatihan',
                'file_rpl_ekstrakulikuler' => 'RPL_Surat_Keterangan_Bekerja',
                'file_rpl_prestasi' => 'RPL_Dokumen_Pendukung_Lainnya',
                'surat_keterangan_pindah' => 'Surat_Keterangan_Pindah',
            ];

            $hasFiles = false;
            foreach ($fileFields as $field => $label) {
                if ($pendaftar->$field) {
                    $filePath = public_path('uploads/' . $pendaftar->$field);
                    if (file_exists($filePath)) {
                        $extension = pathinfo($filePath, PATHINFO_EXTENSION);
                        $zip->addFile($filePath, $label . '.' . $extension);
                        $hasFiles = true;
                    }
                }
            }

            $zip->close();

            if ($hasFiles) {
                return response()->download($zipFilePath)->deleteFileAfterSend(true);
            } else {
                if (file_exists($zipFilePath)) {
                    unlink($zipFilePath);
                }
                return redirect()->back()->with('error', 'Tidak ada berkas yang ditemukan untuk pendaftar ini.');
            }
        } else {
            return redirect()->back()->with('error', 'Gagal membuat file ZIP.');
        }
    }
}
