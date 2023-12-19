<?php

namespace Database\Factories;

use App\Models\GradesEnum;
use App\Models\UserGrade;
use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Uuid;

/**
 * @extends Factory<UserGrade>
 */
class UserGradeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id' => Uuid::uuid7(),
            'user_id' => Uuid::uuid7(),
            'course_id' => Uuid::uuid7(),
            'grade' => $this->faker->randomElement(GradesEnum::cases()),
        ];
    }
}
