<?php

namespace App\Domains\Product\Application\DTOs;

final readonly class CreateProductCommand
{
    public function __construct(
        public string $name,
        public ?string $presentation,
        public ?string $description,
        public ?string $indications,
        public ?string $contraindications,
        public ?array $ingredients,
        public ?string $purchasePrice,
        public ?string $salePrice,
        public ?string $imagePath,
    ) {
    }
}
