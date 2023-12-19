<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    use WithoutModelEvents;

    public const MAT_101 = 'MAT 101';

    public const BIO_120 = 'BIO 120';

    public function run(): void
    {
        $professor = User::select('users.*')
            ->join('roles', 'roles.id', '=', 'users.role_id')
            ->where('roles.name', '=', Role::PROFESSOR)
            ->firstOrFail();

        Course::factory()
            ->create(['name' => self::MAT_101, 'user_id' => $professor->id]);
        Course::factory()
            ->create(['name' => self::BIO_120, 'user_id' => $professor->id]);
    }
}
