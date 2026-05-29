<?php

declare(strict_types=1);

namespace App\Domains\Identity\Application\UseCases;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Domains\Identity\Domain\Entities\Tenant;
use App\Domains\Identity\Domain\ValueObjects\Email;
use App\Domains\Identity\Application\DTOs\RegisterUserCommand;
use App\Domains\Identity\Infrastructure\Persistence\TenantModel;

final class RegisterUser
{
    public function execute(RegisterUserCommand $command): array
    {
        $tenant = new Tenant(
            id: null,
            name: $command->tenantName,
        );

        $email = new Email($command->email);

        $tenantModel = TenantModel::query()->create([
            'name' => $tenant->name,
            'active' => $tenant->active,
        ]);

        $user = User::query()->create([
            'tenant_id' => $tenantModel->id,
            'name' => $command->userName,
            'email' => $email->value,
            'password' => Hash::make('password123'),
        ]);

        return [
            'tenant' => [
                'id' => $tenantModel->id,
                'name' => $tenantModel->name,
                'active' => $tenantModel->active,
            ],
            'user' => [
                'id' => $user->id,
                'tenant_id' => $user->tenant_id,
                'name' => $user->name,
                'email' => $user->email,
            ],
        ];
    }
}
