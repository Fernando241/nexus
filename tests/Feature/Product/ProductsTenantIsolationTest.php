<?php

declare(strict_types=1);

namespace Tests\Feature\Product;

use App\Domains\Product\Infrastructure\Persistence\EloquentProduct;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

final class ProductsTenantIsolationTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_only_returns_products_belonging_to_the_authenticated_tenant(): void
    {
        $tenantA = Tenant::factory()->create([
            'name' => 'Naturaleza Sagrada',
        ]);

        $tenantB = Tenant::factory()->create([
            'name' => 'Otro Tenant',
        ]);

        $userA = User::factory()
            ->forTenant($tenantA)
            ->create();

        EloquentProduct::factory()
            ->forTenant($tenantA)
            ->create([
                'name' => 'Miel',
            ]);

        EloquentProduct::factory()
            ->forTenant($tenantA)
            ->create([
                'name' => 'Granola',
            ]);

        EloquentProduct::factory()
            ->forTenant($tenantB)
            ->create([
                'name' => 'Producto Oculto',
            ]);

        Sanctum::actingAs($userA);

        $response = $this->getJson('/api/products');

        $response->assertOk();

        $response->assertJsonCount(2);

        $response->assertJsonFragment([
            'name' => 'Miel',
        ]);

        $response->assertJsonFragment([
            'name' => 'Granola',
        ]);

        $response->assertJsonMissing([
            'name' => 'Producto Oculto',
        ]);
    }
}
