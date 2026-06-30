<?php

namespace App\Domains\Product\Application\UseCases;

use App\Domains\Identity\Application\Security\CurrentTenant;
use App\Domains\Product\Application\DTOs\CreateProductCommand;
use App\Domains\Product\Application\DTOs\ProductData;
use App\Domains\Product\Infrastructure\Persistence\EloquentProduct;

class CreateProduct
{
    public function __construct(
        private readonly CurrentTenant $currentTenant,
    ) {
    }

    public function execute(CreateProductCommand $command): ProductData
    {
        $product = EloquentProduct::query()->create([
            'tenant_id' => $this->currentTenant->id(),

            'name' => $command->name,
            'presentation' => $command->presentation,
            'description' => $command->description,
            'indications' => $command->indications,
            'contraindications' => $command->contraindications,
            'ingredients' => $command->ingredients,
            'purchase_price' => $command->purchasePrice,
            'sale_price' => $command->salePrice,
            'image_path' => $command->imagePath,
        ]);

        return new ProductData(
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
        );
    }
}
