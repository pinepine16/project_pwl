<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasiswa')->insert([
            'id' => '10000',
            'name' => 'Admin',
            'password' => Hash::make('admin123'),
            'role_id' => 1,
            'program_studi_id' => 1,
        ]);
    }
}
