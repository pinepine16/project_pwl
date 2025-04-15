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
            'id' => '10000',
            'name' => 'Admin',
            'password' => Hash::make('admin123'),
            'role_id' => 1,
            'program_studi_id' => 1,
        ]);
        DB::table('user')->insert([
            'id' => '720001',
            'name' => 'Mahalani',
            'password' => Hash::make('12341234'),
            'role_id' => 2,
            'program_studi_id' => 1,
        ]);
        DB::table('user')->insert([
            'id' => '720002',
            'name' => 'Enji',
            'password' => Hash::make('12341234'),
            'role_id' => 3,
            'program_studi_id' => 1,
        ]);
        DB::table('user')->insert([
            'id' => '2372001',
            'name' => 'Sapin',
            'password' => Hash::make('sapin123'),
            'role_id' => 4,
            'program_studi_id' => 1,
        ]);
    }
}
