<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data-pendaftar', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('agama', ['islam','kristen','katolik','hindu','buddha','konghucu']);
            $table->enum('gender', ['laki-laki', 'perempuan']);
            $table->enum('status', ['single', 'menikah', 'duda', 'janda']);
            $table->string('nik', 16)->unique();
            $table->string('provinsi');
            $table->string('kab_kota')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('desa_kelurahan')->nullable();
            $table->string('kode_pos');
            $table->string('alamat');
            $table->string('alamat_lain')->nullable();
            $table->enum('alamat_pengirim_modul', ['ya', 'tidak']);
            $table->enum('ukuran_almat', ['S', 'M', 'L', 'XL', 'XXL', 'XXXL']);
            $table->string('nama_ibu_kandung');
            $table->string('no_hp', 16);
            $table->string('no_hp_alternatif', 16);
            $table->string('file_ijazah');
            $table->string('file_foto');
            $table->string('file_ktp');
            $table->string('no_ijazah');
            $table->string('file_transkrip');
            $table->string('file_bukti_pembayaran');
            $table->decimal('ipk')->nullable();
            $table->string('surat_pernyataan');
            $table->string('file_rpl_pembelajaran')->nullable();
            $table->string('file_rpl_administrasi')->nullable();
            $table->string('file_rpl_ekstrakulikuler')->nullable();
            $table->string('file_rpl_prestasi')->nullable();
            $table->string('surat_keterangan_pindah')->nullable();
            $table->string('file_cv')->nullable();
            $table->string('file_ss_pddikti')->nullable();
            $table->string('form_tanda_tangan');
            $table->string('email')->unique();
            $table->enum('jalur_program', ['RPL', 'Non-RPL']);
            $table->string('lokasi_ujian_provinsi');
            $table->string('lokasi_ujian_kab_kota')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};