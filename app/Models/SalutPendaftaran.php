<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalutPendaftaran extends Model
{
    use HasFactory;

    protected $table = 'data-pendaftar';

    protected $fillable = [
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'gender',
        'status',
        'nik',
        'provinsi',
        'kab/kota',
        'kecamatan',
        'desa/kelurahan',
        'kode_pos',
        'alamat',
        'alamat_pengirim_modul',
        'ukuran_almat',
        'nama_ibu_kandung',
        'no_hp',
        'no_hp_alternatif',
        'email',
        'jalur_program',
    ];
    protected $hidden = [
        'remember_token',
        'password'
    ];
}