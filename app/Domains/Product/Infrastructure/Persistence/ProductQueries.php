<?php

namespace App\Domains\Product\Infrastructure\Persistence;

use App\Domains\Product\Application\DTOs\ProductData;

class ProductQueries
{
    public function forTenant(int $tenantId): array
    {
        return EloquentProduct::query()
            ->where('tenant_id', $tenantId)
            ->orderBy('name')
            ->get()
            ->map(fn (EloquentProduct $product) => new ProductData(
                id: $product->id,
                tenantId: $product->tenant_id,
                name: $product->name,
            ))
            ->all();
    }
}
