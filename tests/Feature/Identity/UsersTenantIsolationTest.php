<?php

declare(strict_types=1);

namespace Tests\Feature\Identity;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

final class UsersTenantIsolationTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_only_returns_users_belonging_to_the_authenticated_tenant(): void
    {
        $tenantA = Tenant::factory()->create([
            'name' => 'Naturaleza Sagrada',
        ]);

        $tenantB = Tenant::factory()->create([
            'name' => 'Otro Tenant',
        ]);

        $userA1 = User::factory()
            ->forTenant($tenantA)
            ->create([
                'name' => 'Fernando',
                'email' => 'fernando@test.com',
            ]);

        $userA2 = User::factory()
            ->forTenant($tenantA)
            ->create([
                'name' => 'Maria',
                'email' => 'maria@test.com',
            ]);

        $userB1 = User::factory()
            ->forTenant($tenantB)
            ->create([
                'name' => 'Carlos',
                'email' => 'carlos@test.com',
            ]);

        Sanctum::actingAs($userA1);

        $response = $this->getJson('/api/users');

        $response->assertOk();

        $response->assertJsonFragment([
            'email' => 'fernando@test.com',
        ]);

        $response->assertJsonFragment([
            'email' => 'maria@test.com',
        ]);

        $response->assertJsonMissing([
            'email' => 'carlos@test.com',
        ]);
    }
}

