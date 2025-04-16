<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil seeder-seeder yang dibutuhkan
        $this->call([
            ProgramStudiSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            LetterTypeSeeder::class,
        ]);
    }
}
