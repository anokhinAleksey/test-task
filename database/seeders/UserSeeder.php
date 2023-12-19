<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;

    public const A_STUDENT_NAME = 'A Student';

    public const B_STUDENT_NAME = 'B Student';

    public const C_STUDENT_NAME = 'C Student';

    public function run(): void
    {
        foreach ($this->data() as $data) {
            User::create($data);
        }
    }

    private function data(): array
    {
        $roleProfessor = Role::where('name', Role::PROFESSOR)->firstOrFail();
        $roleStudent = Role::where('name', Role::STUDENT)->firstOrFail();

        return [
            [
                'id' => Uuid::uuid7(),
                'name' => self::A_STUDENT_NAME,
                'email' => 'a.student@concordia.ab.ca',
                'password' => Hash::make('QwErTy!2#4'),
                'role_id' => $roleStudent->id,
            ],
            [
                'id' => Uuid::uuid7(),
                'name' => self::B_STUDENT_NAME,
                'email' => 'b.student@concordia.ab.ca',
                'password' => Hash::make('1234Pwrd!'),
                'role_id' => $roleStudent->id,
            ],
            [
                'id' => Uuid::uuid7(),
                'name' => self::C_STUDENT_NAME,
                'email' => 'c.student@concordia.ab.ca',
                'password' => Hash::make('sF#r9sdfj'),
                'role_id' => $roleStudent->id,
            ],
            [
                'id' => Uuid::uuid7(),
                'name' => 'A Professor',
                'email' => 'a.professor@concordia.ab.ca',
                'password' => Hash::make('%T^Y123A'),
                'role_id' => $roleProfessor->id,
            ],
        ];
    }
}
