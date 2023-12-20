<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AliveTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_application_returns_a_successful_response() : void
    {
        $role = Role::factory()->create();
        $user = User::factory()->create(['role_id' => $role->id]);

        $response = $this->actingAs($user)->get('/');

        $response->assertStatus(200);
    }
}
