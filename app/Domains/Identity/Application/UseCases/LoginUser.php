<?php

declare(strict_types=1);

namespace App\Domains\Identity\Application\UseCases;

use App\Models\User;
use App\Domains\Identity\Application\DTOs\LoginCommand;
use App\Domains\Identity\Application\DTOs\AuthenticatedUser;
use App\Domains\Identity\Application\Security\PasswordHasher;
use App\Domains\Identity\Application\Exceptions\InvalidCredentialsException;

final class LoginUser
{
    public function __construct(
        private readonly PasswordHasher $passwordHasher,
    ) {
    }

    public function execute(
        LoginCommand $command,
    ): AuthenticatedUser {
        $user = User::query()
            ->where('email', $command->email)
            ->first();

        if ($user === null) {
            throw new InvalidCredentialsException();
        }

        if (! $this->passwordHasher->verify(
            $command->password,
            $user->password,
        )) {
            throw new InvalidCredentialsException();
        }

        return new AuthenticatedUser(
            userId: $user->id,
            tenantId: $user->tenant_id,
            name: $user->name,
            email: $user->email,
        );
    }
}
