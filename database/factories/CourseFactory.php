<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Uuid;

/**
 * @extends Factory<Course>
 */
class CourseFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id' => Uuid::uuid7(),
            'name' => $this->faker->countryCode().' '.$this->faker->randomNumber(3),
            'user_id' => Uuid::uuid7(),
        ];
    }
}
