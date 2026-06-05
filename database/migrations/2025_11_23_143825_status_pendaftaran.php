<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('data-pendaftar', function (Blueprint $table) {
            $table->string('status', 50)->change();
            $table->string('status_pendaftaran')->default('pending')->after('file_bukti_pembayaran');
        });
    }

    public function down(): void
    {
        Schema::table('data-pendaftar', function (Blueprint $table) {
            $table->dropColumn('status_pendaftaran');
            
            $table->string('status', 20)->change();
        });
    }
};