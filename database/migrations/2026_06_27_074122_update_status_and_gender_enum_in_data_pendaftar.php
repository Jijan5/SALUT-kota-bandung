<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Menyesuaikan ENUM status & gender agar cocok dengan nilai yang dikirim form.
     * Migrasi data lama terlebih dahulu sebelum mengubah ENUM.
     */
    public function up(): void
    {
        $prefix = DB::getTablePrefix();
        // ---- 1. Ubah dulu ke string sementara agar tidak ada konflik ----
        DB::statement("ALTER TABLE `{$prefix}data-pendaftar` MODIFY `status` VARCHAR(50) NOT NULL");
        DB::statement("ALTER TABLE `{$prefix}data-pendaftar` MODIFY `gender` VARCHAR(50) NOT NULL");

        // ---- 2. Migrasi data status lama ke nilai baru ----
        DB::table('data-pendaftar')->where('status', 'single')->update(['status' => 'Belum Kawin']);
        DB::table('data-pendaftar')->where('status', 'menikah')->update(['status' => 'Kawin']);
        DB::table('data-pendaftar')->where('status', 'duda')->update(['status' => 'Cerai Hidup']);
        DB::table('data-pendaftar')->where('status', 'janda')->update(['status' => 'Cerai Hidup']);

        // ---- 3. Migrasi data gender lama ke nilai baru ----
        DB::table('data-pendaftar')->where('gender', 'laki-laki')->update(['gender' => 'Laki-laki']);
        DB::table('data-pendaftar')->where('gender', 'perempuan')->update(['gender' => 'Perempuan']);
        // Nilai 'Laki-laki' dan 'Perempuan' yang sudah ada dari form sudah benar

        // ---- 4. Ubah kembali ke ENUM dengan nilai yang baru dan benar ----
        DB::statement("ALTER TABLE `{$prefix}data-pendaftar` MODIFY `status` ENUM('Kawin','Belum Kawin','Cerai Hidup','Cerai Mati') NOT NULL");
        DB::statement("ALTER TABLE `{$prefix}data-pendaftar` MODIFY `gender` ENUM('Laki-laki','Perempuan') NOT NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $prefix = DB::getTablePrefix();
        DB::statement("ALTER TABLE `{$prefix}data-pendaftar` MODIFY `status` VARCHAR(50) NOT NULL");
        DB::statement("ALTER TABLE `{$prefix}data-pendaftar` MODIFY `gender` VARCHAR(50) NOT NULL");

        DB::table('data-pendaftar')->where('status', 'Belum Kawin')->update(['status' => 'single']);
        DB::table('data-pendaftar')->where('status', 'Kawin')->update(['status' => 'menikah']);
        DB::table('data-pendaftar')->where('status', 'Cerai Hidup')->update(['status' => 'duda']);
        DB::table('data-pendaftar')->where('status', 'Cerai Mati')->update(['status' => 'janda']);
        DB::table('data-pendaftar')->where('gender', 'Laki-laki')->update(['gender' => 'laki-laki']);
        DB::table('data-pendaftar')->where('gender', 'Perempuan')->update(['gender' => 'perempuan']);

        DB::statement("ALTER TABLE `{$prefix}data-pendaftar` MODIFY `status` ENUM('single','menikah','duda','janda') NOT NULL");
        DB::statement("ALTER TABLE `{$prefix}data-pendaftar` MODIFY `gender` ENUM('laki-laki','perempuan') NOT NULL");
    }
};
