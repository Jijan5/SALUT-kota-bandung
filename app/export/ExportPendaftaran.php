<?php

namespace App\export;

use App\Models\SalutPendaftaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportPendaftaran implements FromCollection, WithHeadings
{
    public function collection()
    {
        return SalutPendaftaran::select(
            'nama',
            'tempat_lahir',
            'tanggal_lahir',
            'agama',
            'gender',
            'status',
            'nik',
            'provinsi',
            'kab_kota',
            'kecamatan',
            'desa_kelurahan',
            'kode_pos',
            'alamat',
            'alamat_lain',
            'lokasi_ujian_provinsi',
            'lokasi_ujian_kab_kota',
            'alamat_pengirim_modul',
            'ukuran_almat',
            'nama_ibu_kandung',
            'no_hp',
            'no_hp_alternatif',
            'email',
            'jalur_program',
            'file_ijazah',
            'no_ijazah',
            'ipk',
            'file_bukti_pembayaran',
            'surat_pernyataan',
            'form_tanda_tangan',
            'file_foto',
            'file_ktp',
            'file_ss_pddikti',
            'file_transkrip',
            'file_rpl_pembelajaran',
            'file_rpl_administrasi',
            'file_rpl_ekstrakulikuler',
            'file_rpl_prestasi',
            'surat_keterangan_pindah',
            'file_cv',
        )->get();
    }

    public function headings(): array
    {
        return [
            'nama',
            'tempat_lahir',
            'tanggal_lahir',
            'agama',
            'gender',
            'status',
            'nik',
            'provinsi',
            'kab_kota',
            'kecamatan',
            'desa_kelurahan',
            'kode_pos',
            'alamat',
            'alamat_lain',
            'lokasi_ujian_provinsi',
            'lokasi_ujian_kab_kota',
            'alamat_pengirim_modul',
            'ukuran_almat',
            'nama_ibu_kandung',
            'no_hp',
            'no_hp_alternatif',
            'email',
            'jalur_program',
            'file_ijazah',
            'no_ijazah',
            'ipk',
            'file_bukti_pembayaran',
            'surat_pernyataan',
            'form_tanda_tangan',
            'file_foto',
            'file_ktp',
            'file_ss_pddikti',
            'file_transkrip',
            'file_rpl_pembelajaran',
            'file_rpl_administrasi',
            'file_rpl_ekstrakulikuler',
            'file_rpl_prestasi',
            'surat_keterangan_pindah',
            'file_cv',
        ];
    }
}