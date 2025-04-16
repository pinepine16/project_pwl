<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasiswa')->insert([
            'id' => '10001',
            'name' => 'Davin Chen',
            'nrp' => '2372001',
            'address' =>'Jl. Kaki',
            'semester' => '3',
            'user_id' => '2372001',

        ]);
    }
}
