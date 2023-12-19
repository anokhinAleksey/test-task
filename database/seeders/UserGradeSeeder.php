<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\GradesEnum;
use App\Models\User;
use App\Models\UserGrade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class UserGradeSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        foreach ($this->data() as $data) {
            UserGrade::create($data);
        }
    }

    private function data(): array
    {
        $aStudent = User::where('name', UserSeeder::A_STUDENT_NAME)->firstOrFail();
        $bStudent = User::where('name', UserSeeder::B_STUDENT_NAME)->firstOrFail();
        $cStudent = User::where('name', UserSeeder::C_STUDENT_NAME)->firstOrFail();
        $courseMat101 = Course::where('name', CourseSeeder::MAT_101)->firstOrFail();
        $courseBio120 = Course::where('name', CourseSeeder::BIO_120)->firstOrFail();

        return [
            [
                'id' => Uuid::uuid7(),
                'user_id' => $aStudent->id,
                'course_id' => $courseMat101->id,
                'grade' => GradesEnum::A,
            ],
            [
                'id' => Uuid::uuid7(),
                'user_id' => $aStudent->id,
                'course_id' => $courseBio120->id,
                'grade' => GradesEnum::B,
            ],
            [
                'id' => Uuid::uuid7(),
                'user_id' => $bStudent->id,
                'course_id' => $courseBio120->id,
                'grade' => GradesEnum::C,
            ],
            [
                'id' => Uuid::uuid7(),
                'user_id' => $cStudent->id,
                'course_id' => $courseMat101->id,
                'grade' => GradesEnum::B_PLUS,
            ],
        ];
    }
}
