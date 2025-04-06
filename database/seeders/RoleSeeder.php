<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['id' => 1, 'role_name' => 'admin'],
            ['id' => 2, 'role_name' => 'kaprodi'],
            ['id' => 3, 'role_name' => 'tu'],
            ['id' => 4, 'role_name' => 'mahasiswa'],
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate(['id' => $role['id']], $role);
        }
    }
}
