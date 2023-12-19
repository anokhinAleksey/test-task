<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        Role::factory()->create([
            'name' => Role::STUDENT,
        ]);

        Role::factory()->create([
            'name' => Role::PROFESSOR,
        ]);
    }
}
