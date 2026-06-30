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

            'presentation' => fake()->randomElement([
                'Frasco 30 ml',
                'Frasco 60 ml',
                'Frasco 120 ml',
                'Gotero 30 ml',
                'Bolsa 250 g',
            ]),

            'description' => fake()->sentence(12),

            'indications' => fake()->sentence(),

            'contraindications' => fake()->sentence(),

            'ingredients' => fake()->randomElements([
                'Sangre de drago',
                'Caléndula',
                'Romero',
                'Ortiga',
                'Llantén',
                'Propóleo',
                'Uña de gato',
                'Eucalipto',
            ], fake()->numberBetween(2, 5)),

            'purchase_price' => fake()->randomFloat(
                2,
                5000,
                50000
            ),

            'sale_price' => fake()->randomFloat(
                2,
                15000,
                120000
            ),

            'image_path' => null,
            /* fake()->optional()->imageUrl(
                600,
                600,
                'products'
            ), */
        ];
    }

    public function forTenant(Tenant $tenant): static
    {
        return $this->state(fn () => [
            'tenant_id' => $tenant->id,
        ]);
    }
}
