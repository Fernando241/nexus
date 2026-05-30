<?php

declare(strict_types=1);

namespace App\Domains\Identity\Application\DTOs;

final readonly class LoginCommand
{
    public function __construct(
        public string $email,
        public string $password,
    ) {
    }
}
