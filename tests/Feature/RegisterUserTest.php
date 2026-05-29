<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

final class RegisterUserTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_registers_a_user_and_tenant_successfully(): void
    {
        $response = $this->postJson('/api/register', [
            'tenant_name' => 'Naturaleza Sagrada',
            'user_name' => 'Fernando',
            'email' => 'fernando@test.com',
        ]);

        $response->assertCreated();

        $response->assertJson([
            'message' => 'User registered successfully.',
        ]);

        $this->assertDatabaseHas('tenants', [
            'name' => 'Naturaleza Sagrada',
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'fernando@test.com',
            'name' => 'Fernando',
        ]);
    }

    public function test_it_rejects_invalid_email(): void
    {
        $response = $this->postJson('/api/register', [
            'tenant_name' => 'Naturaleza Sagrada',
            'user_name' => 'Fernando',
            'email' => 'invalid-email',
        ]);

        $response->assertStatus(422);

        $response->assertJsonValidationErrors([
            'email',
        ]);

        $this->assertDatabaseMissing('users', [
            'email' => 'invalid-email',
        ]);
    }
}
