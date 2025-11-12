<?php

namespace Database\Seeders;

use App\Models\SalutPendaftaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class calonMahasiswa extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SalutPendaftaran::factory()->count(50)->create();
    }
}