<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

final class LoginUserTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_logs_in_with_valid_credentials(): void
    {
        $this->postJson('/api/register', [
            'tenant_name' => 'Naturaleza Sagrada',
            'user_name' => 'Fernando',
            'email' => 'fernando@test.com',
            'password' => 'password123',
        ]);

        $response = $this->postJson('/api/login', [
            'email' => 'fernando@test.com',
            'password' => 'password123',
        ]);

        $response->assertOk();

        $response->assertJson([
            'data' => [
                'email' => 'fernando@test.com',
            ],
        ]);
    }

    public function test_it_rejects_invalid_credentials(): void
    {
        $this->postJson('/api/register', [
            'tenant_name' => 'Naturaleza Sagrada',
            'user_name' => 'Fernando',
            'email' => 'fernando@test.com',
            'password' => 'password123',
        ]);

        $response = $this->postJson('/api/login', [
            'email' => 'fernando@test.com',
            'password' => 'wrong-password',
        ]);

        $response->assertUnauthorized();

        $response->assertJson([
            'message' => 'Invalid credentials.',
        ]);
    }
}
