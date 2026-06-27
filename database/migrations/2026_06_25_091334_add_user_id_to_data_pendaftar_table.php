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
        if (!Schema::hasColumn('data-pendaftar', 'user_id')) {
            Schema::table('data-pendaftar', function (Blueprint $table) {
                $table->unsignedBigInteger('user_id')->nullable()->after('id');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data-pendaftar', function (Blueprint $table) {
            // $table->dropForeign(['user_id']); // uncomment jika pakai FK
            $table->dropColumn('user_id');
        });
    }
};
