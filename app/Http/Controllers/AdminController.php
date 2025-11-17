<?php

namespace App\Http\Controllers;

use App\export\ExportPendaftaran;
use App\Models\SalutPendaftaran;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function exportPdf()
    {
        $datapendaftar = SalutPendaftaran::all();
        $pdf = Pdf::loadView('admin.export-pdf', compact('datapendaftar'))->setPaper('a2', 'landscape');

        return $pdf->stream('data_pendaftar.pdf');
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
            ->when($search, function ($query, $search) {
                return $query->where('nama', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('jalur_program', 'like', "%{$search}%")
                    ->orWhere('nik', 'like', "%{$search}%")
                    ->orWhere('no_ijazah', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.admin-salut', ['datapendaftar' => $pendaftar]);
    }

    public function edit($id)
    {
        $data = SalutPendaftaran::findOrFail($id);

        return view('admin.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $record = SalutPendaftaran::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'nullable|string|max:255',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'agama' => 'nullable|in:islam,kristen,katolik,hindu,buddha,konghucu',
            'gender' => 'nullable|string',
            'status' => 'nullable|string',
            'nik' => 'nullable|string|size:16',
            'provinsi' => 'nullable|string|max:255',
            'kab_kota' => 'nullable|string|max:255',
            'kecamatan' => 'nullable|string|max:255',
            'desa_kelurahan' => 'nullable|string|max:255',
            'kode_pos' => 'nullable|string|max:10',
            'alamat' => 'nullable|string|max:500',
            'alamat_lain' => 'nullable|string|max:500',
            'alamat_pengirim_modul' => 'nullable|string|max:3',
            'ukuran_almat' => 'nullable|string|max:10',
            'nama_ibu_kandung' => 'nullable|string|max:255',
            'no_hp' => 'nullable|string|max:16',
            'no_hp_alternatif' => 'nullable|string|max:16',
            'email' => 'nullable|email|max:255',
            'jalur_program' => 'nullable|string|max:10',
            'file_ijazah' => 'nullable|file|mimes:pdf|max:2048',
            'no_ijazah' => 'nullable|string|max:255',
            'ipk' => 'numeric|nullable|min:2.00|max:4.00',
            'file_bukti_pembayaran' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'surat_pernyataan' => 'nullable|file|mimes:pdf|max:2048',
            'form_tanda_tangan' => 'nullable|file|mimes:pdf|max:2048',
            'file_foto' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'file_ktp' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'file_ss_pddikti' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'file_transkrip' => 'nullable|file|mimes:pdf|max:2048',
            'file_rpl_pembelajaran' => 'nullable|file|mimes:pdf|max:2048',
            'file_rpl_administrasi' => 'nullable|file|mimes:pdf|max:2048',
            'file_rpl_ekstrakulikuler' => 'nullable|file|mimes:pdf|max:2048',
            'file_rpl_prestasi' => 'nullable|file|mimes:pdf|max:2048',
            'surat_keterangan_pindah' => 'nullable|file|mimes:pdf|max:2048',
            'file_cv' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        // Proses upload file baru jika ada
        $fileFields = [
            'file_ijazah',
            'file_transkrip',
            'file_foto',
            'file_ktp',
            'file_ss_pddikti',
            'form_tanda_tangan',
            'surat_pernyataan',
            'surat_keterangan_pindah',
            'file_rpl_pembelajaran',
            'file_rpl_administrasi',
            'file_rpl_ekstrakulikuler',
            'file_rpl_prestasi',
            'file_cv',
            'file_bukti_pembayaran',
        ];
        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $validated[$field] = $request->file($field)->store('uploads', 'public');
            }
        }

        $record->update($validated);

        return redirect()->route('admin.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function delete($id)
    {
        $data = SalutPendaftaran::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.index')->with('success', 'Data berhasil dihapus!');
    }
}
