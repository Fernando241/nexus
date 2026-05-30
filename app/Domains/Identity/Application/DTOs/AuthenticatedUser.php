<?php

declare(strict_types=1);

namespace App\Domains\Identity\Application\DTOs;

final readonly class AuthenticatedUser
{
    public function __construct(
        public int $userId,
        public int $tenantId,
        public string $name,
        public string $email,
    ) {
    }
}
