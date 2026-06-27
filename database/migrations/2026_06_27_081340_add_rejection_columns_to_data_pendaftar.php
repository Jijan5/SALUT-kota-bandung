<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Tambah kolom untuk fitur penolakan
        if (!Schema::hasColumn('data-pendaftar', 'alasan_penolakan')) {
            Schema::table('data-pendaftar', function (Blueprint $table) {
                $table->text('alasan_penolakan')->nullable()->after('status_pendaftaran');
                $table->json('file_ditolak')->nullable()->after('alasan_penolakan');
            });
        }

        // 2. Izinkan nilai 'ditolak' pada kolom status_pendaftaran
        DB::statement("ALTER TABLE `data-pendaftar` MODIFY `status_pendaftaran` VARCHAR(20) NOT NULL DEFAULT 'pending'");
    }

    public function down(): void
    {
        Schema::table('data-pendaftar', function (Blueprint $table) {
            $table->dropColumn(['alasan_penolakan', 'file_ditolak']);
        });
    }
};
