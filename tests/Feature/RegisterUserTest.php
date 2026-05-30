<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;

final class RegisterUserTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_registers_a_user_and_tenant_successfully(): void
    {
        $password = 'password123';

        $response = $this->postJson('/api/register', [
            'tenant_name' => 'Naturaleza Sagrada',
            'user_name' => 'Fernando',
            'email' => 'fernando@test.com',
            'password' => $password,
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

        $user = User::query()
            ->where('email', 'fernando@test.com')
            ->first();

        $this->assertNotNull($user);

        $this->assertNotEquals(
            $password,
            $user->password
        );

        $this->assertTrue(
            Hash::check(
                $password,
                $user->password
            )
        );
    }

    public function test_it_rejects_invalid_email(): void
    {
        $response = $this->postJson('/api/register', [
            'tenant_name' => 'Naturaleza Sagrada',
            'user_name' => 'Fernando',
            'email' => 'invalid-email',
            'password' => 'password123',
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
