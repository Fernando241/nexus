<?php

namespace App\Domains\Identity\Application\Security;

interface PasswordHasher
{
    public function hash(string $password): string;

    public function verify(
        string $plainPassword,
        string $hashedPassword
    ): bool;
}
