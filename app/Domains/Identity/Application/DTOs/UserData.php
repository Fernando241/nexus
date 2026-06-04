<?php

namespace App\Domains\Identity\Application\DTOs;

final readonly class UserData
{
    public function __construct(
        public int $id,
        public string $name,
        public string $email,
    ) {}
}
