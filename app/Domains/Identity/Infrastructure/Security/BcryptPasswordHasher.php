<?php

namespace App\Domains\Identity\Infrastructure\Security;

use Illuminate\Support\Facades\Hash;
use App\Domains\Identity\Application\Security\PasswordHasher;

class BcryptPasswordHasher implements PasswordHasher
{
    public function hash(string $password): string
    {
        return Hash::make($password);
    }

    public function verify(
        string $plainPassword,
        string $hashedPassword
    ): bool {
        return Hash::check(
            $plainPassword,
            $hashedPassword
        );
    }
}
