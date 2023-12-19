<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Uuid;

/**
 * @extends Factory<Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => Uuid::uuid7(),
            'from_user_id' => Uuid::uuid7(),
            'to_user_id' => Uuid::uuid7(),
            'course_id' => Uuid::uuid7(),
            'question' => $this->faker->sentence,
        ];
    }
}
