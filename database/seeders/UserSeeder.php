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
        DB::table('user')->insert([
            'id' => '72000',
            'name' => 'Mahalani',
            'password' => Hash::make('dale10'),
            'role_id' => 2,
            'program_studi_id' => 1,
        ]);
        DB::table('user')->insert([
            'id' => '30001',
            'name' => 'Enji',
            'password' => Hash::make('bonbon1'),
            'role_id' => 3,
            'program_studi_id' => 1,
        ]);
        DB::table('user')->insert([
            'id' => '40001',
            'name' => 'Sapin',
            'password' => Hash::make('sapin123'),
            'role_id' => 4,
            'program_studi_id' => 1,
        ]);
    }
}
