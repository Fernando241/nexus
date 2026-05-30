<?php

declare(strict_types=1);

namespace App\Domains\Identity\Application\DTOs;

final readonly class RegisterUserCommand
{
    public function __construct(
        public string $tenantName,
        public string $userName,
        public string $password,
        public string $email,
    ) {
    }
}
