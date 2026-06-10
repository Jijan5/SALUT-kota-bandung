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
    public function exportPdf()
    {
        $datapendaftar = SalutPendaftaran::all();
        $pdf = Pdf::loadView('admin.export-pdf', compact('datapendaftar'))->setPaper('a2', 'landscape');

        return $pdf->stream('data_pendaftar_salut.pdf');
    }

    public function admin()
    {
        $pendaftar = SalutPendaftaran::all();

        return view('admin.admin-salut', ['data-pendaftar' => $pendaftar]);
    }

    public function exportExcel()
    {
        return Excel::download(new ExportPendaftaran, 'data_pendaftar.xlsx');
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
        $jumlahPending = SalutPendaftaran::where('status_pendaftaran', 'pending')->count();

        return view('admin.admin-dashboard', [
            'totalPendaftar' => $totalPendaftar,
            'jumlahDiterima' => $jumlahDiterima,
            'jumlahPending' => $jumlahPending,
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

    /**
     * Mengubah status pendaftar menjadi 'diterima'.
     */
    public function terima(int $id)
    {
        $pendaftar = SalutPendaftaran::findOrFail($id);
        $pendaftar->status_pendaftaran = 'diterima';
        $pendaftar->save();

        return redirect()->route('admin.index')->with('success', 'Siswa telah diterima dan dipindahkan ke halaman Siswa Diterima.');
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
            'jalur_program' => 'nullable|in:RPL,Non-RPL',
            'file_foto' => 'nullable|file|mimes:jpg,jpeg,png|max:25600',
            'file_ktp' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:25600',
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
        ]);

        // HAPUS email dari $validated karena tidak ada di fillable data-pendaftar
        $emailToUpdate = $request->email;
        unset($validated['email']);

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
                    Storage::disk('public')->delete($record->$field);
                }
                $validated[$field] = $request->file($field)->store('pendaftaran/' . $record->user_id, 'public');
            }
        }

        // Update data pendaftaran (tanpa email)
        $record->update($validated);

        // Update email di tabel users jika ada perubahan dan user ditemukan
        if ($user && $emailToUpdate) {
            $user->email = $emailToUpdate;
            $user->save();
        }

        // Jika pindah dari RPL ke Non-RPL, hapus file-file RPL
        $oldJalurProgram = $record->getOriginal('jalur_program');
        $newJalurProgram = $request->jalur_program;

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
                if ($record->$fileField) {
                    Storage::disk('public')->delete($record->$fileField);
                    $record->$fileField = null;
                }
            }
            $record->ipk = null;
            $record->save();
        }

        return redirect()->route('admin.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function delete(int $id)
    {
        $data = SalutPendaftaran::findOrFail($id);
        $data->delete();

        return back()->with('success', 'Data berhasil dihapus!');
    }
}
