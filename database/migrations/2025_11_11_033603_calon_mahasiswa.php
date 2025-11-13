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
            $table->enum('agama', ['islam', 'kristen', 'katolik', 'hindu', 'buddha', 'konghucu']);
            $table->enum('gender', ['laki-laki', 'perempuan']);
            $table->enum('status', ['single', 'menikah', 'duda', 'janda']);
            $table->string('nik', 16)->unique();
            $table->string('provinsi');
            $table->string('kab_kota');
            $table->string('kecamatan');
            $table->string('desa_kelurahan');
            $table->string('kode_pos');
            $table->string('alamat');
            $table->string('alamat_lain')->nullable();
            $table->enum('alamat_pengirim_modul', ['ya', 'tidak']);
            $table->enum('ukuran_almat', ['S', 'M', 'L', 'XL', 'XXL', 'XXXL']);
            $table->string('nama_ibu_kandung');
            $table->string('no_hp', 16);
            $table->string('no_hp_alternatif', 16);
            $table->string('email')->unique();
            $table->enum('jalur_program', ['RPL', 'Non-RPL']);
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