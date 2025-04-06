<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('user')->insert([
            'id' => '2310000',
            'name' => 'Admin Dua',
            'password' => Hash::make('admin123'),
            'role_id' => 1,
            'program_studi_id' => 1,
        ]);
    }
}
