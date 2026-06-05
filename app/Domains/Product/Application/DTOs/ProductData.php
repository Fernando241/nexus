<?php

namespace App\Domains\Product\Application\DTOs;

class ProductData
{
    public function __construct(
        public readonly int $id,
        public readonly int $tenantId,
        public readonly string $name,
    ) {
    }
}
