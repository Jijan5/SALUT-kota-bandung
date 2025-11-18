<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
            'name' => 'Admin Salut',
            'email' => 'salut_admin@gmail.com',
            'password' => Hash::make('admin_salut11953'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}