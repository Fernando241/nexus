<?php

namespace App\Domains\Product\Application\UseCases;

use App\Domains\Identity\Application\Security\CurrentTenant;
use App\Domains\Product\Infrastructure\Persistence\ProductQueries;

class ListProducts
{
    public function __construct(
        private readonly CurrentTenant $currentTenant,
        private readonly ProductQueries $queries,
    ) {
    }

    public function execute(): array
    {
        return $this->queries->forTenant(
            $this->currentTenant->id()
        );
    }
}
