<?php

namespace Database\Factories;

use App\Domains\Product\Infrastructure\Persistence\EloquentProduct;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = EloquentProduct::class;

    public function definition(): array
    {
        return [
            'name' => fake()->words(2, true),
        ];
    }

    public function forTenant(Tenant $tenant): static
    {
        return $this->state(fn () => [
            'tenant_id' => $tenant->id,
        ]);
    }
}
