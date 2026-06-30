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
                presentation: $product->presentation,
                description: $product->description,
                indications: $product->indications,
                contraindications: $product->contraindications,
                ingredients: $product->ingredients,
                purchasePrice: $product->purchase_price,
                salePrice: $product->sale_price,
                imagePath: $product->image_path,
            ))
            ->all();
    }
}
