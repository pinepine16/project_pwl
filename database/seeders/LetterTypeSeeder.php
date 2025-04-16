<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\lettertype;

class LetterTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            ['id_type' => 1,'letter_name' => 'kl'],
            ['id_type' => 2,'letter_name' => 'lhs'],
            ['id_type' => 3,'letter_name' => 'skma'],
            ['id_type' => 4,'letter_name' => 'sptmk'],
        ];

        foreach ($types as $type) {
            LetterType::create($type);
        }
    }
}
