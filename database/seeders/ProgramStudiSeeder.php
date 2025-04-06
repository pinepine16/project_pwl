<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\programStudi;

class ProgramStudiSeeder extends Seeder
{
    public function run(): void
    {
        $programs = [
            ['id' => 1,'major_name' => 'Teknik Informatika'],
            ['id' => 2,'major_name' => 'Sistem Informasi'],
            ['id' => 3,'major_name' => 'Teknik Elektro'],
            ['id' => 4,'major_name' => 'Manajemen Informatika'],
        ];

        foreach ($programs as $program) {
            ProgramStudi::create($program);
        }
    }
}
