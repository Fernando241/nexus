<?php

namespace App\Domains\Identity\Application\UseCases;

use App\Domains\Identity\Application\DTOs\CurrentTenantData;
use App\Domains\Identity\Application\Security\CurrentTenant;

final readonly class GetCurrentTenant
{
    public function __construct(
        private CurrentTenant $currentTenant,
    ) {}

    public function execute(): CurrentTenantData
    {
        return new CurrentTenantData(
            tenantId: $this->currentTenant->id(),
        );
    }
}
