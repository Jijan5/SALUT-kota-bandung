<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalutPendaftaran extends Model
{
    use HasFactory;

    protected $table = 'data-pendaftar';

    protected $fillable = [
        'user_id',  // <-- TAMBAHKAN INI
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
        'alamat_pengirim_modul',
        'lokasi_ujian_provinsi',
        'lokasi_ujian_kab_kota',
        'ukuran_almat',
        'nama_ibu_kandung',
        'no_hp',
        'no_hp_alternatif',
        // 'email',  <-- HAPUS ATAU COMMENT INI
        'jalur_program',
        'file_ijazah',
        'no_ijazah',
        'ipk',
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
        'file_cv',
    ];

    protected $hidden = [
        'remember_token',
    ];

    // TAMBAHKAN RELASI KE USER
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}