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
        Schema::table('data-pendaftar', function (Blueprint $table) {
            $table->string('email')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('data-pendaftar', function (Blueprint $table) {
            $table->string('email')->nullable(false)->change();
        });
    }
};
