<?php

namespace App\Domains\Product\Application\UseCases;

use App\Domains\Product\Application\DTOs\ProductData;
use App\Domains\Product\Infrastructure\Persistence\EloquentProduct;
use App\Domains\Identity\Application\Security\CurrentTenant;

class CreateProduct
{
    public function __construct(
        private readonly CurrentTenant $currentTenant,
    ) {
    }

    public function execute(string $name): ProductData
    {
        $product = EloquentProduct::query()->create([
            'tenant_id' => $this->currentTenant->id(),
            'name' => $name,
        ]);

        return new ProductData(
            id: $product->id,
            tenantId: $product->tenant_id,
            name: $product->name,
        );
    }
}
