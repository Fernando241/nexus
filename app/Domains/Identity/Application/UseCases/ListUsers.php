<?php

namespace App\Domains\Identity\Application\UseCases;

use App\Domains\Identity\Application\DTOs\UserData;
use App\Domains\Identity\Application\Security\CurrentTenant;
use App\Domains\Identity\Infrastructure\Persistence\UserQueries;

final readonly class ListUsers
{
    public function __construct(
        private CurrentTenant $currentTenant,
        private UserQueries $userQueries,
    ) {}

    /**
     * @return array<UserData>
     */
    public function execute(): array
    {
        $users = $this->userQueries->forTenant(
            $this->currentTenant->id()
        );

        return $users
            ->map(fn ($user) => new UserData(
                id: $user->id,
                name: $user->name,
                email: $user->email,
            ))
            ->all();
    }
}
