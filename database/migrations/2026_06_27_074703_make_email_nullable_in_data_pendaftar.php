<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Kolom email di tabel data-pendaftar dijadikan nullable
     * karena sistem sekarang menggunakan user_id untuk relasi ke tabel users.
     * Email user sudah tersimpan di tabel users, tidak perlu duplikasi.
     */
    public function up(): void
    {
        $prefix = DB::getTablePrefix();
        DB::statement("ALTER TABLE `{$prefix}data-pendaftar` MODIFY `email` VARCHAR(255) NULL");
    }

    public function down(): void
    {
        $prefix = DB::getTablePrefix();
        DB::statement("ALTER TABLE `{$prefix}data-pendaftar` MODIFY `email` VARCHAR(255) NOT NULL");
    }
};
