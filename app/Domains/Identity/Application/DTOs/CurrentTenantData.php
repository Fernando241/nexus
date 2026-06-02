<?php

namespace App\Domains\Identity\Application\DTOs;

final readonly class CurrentTenantData
{
    public function __construct(
        public int $tenantId,
    ) {}
}
