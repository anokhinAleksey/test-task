<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Uuid;

/**
 * @extends Factory<Role>
 */
class RoleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id' => Uuid::uuid7(),
            'name' => $this->faker->randomElement([Role::STUDENT, Role::PROFESSOR]),
        ];
    }
}
