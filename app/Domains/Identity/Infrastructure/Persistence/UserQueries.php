<?php

namespace App\Domains\Identity\Infrastructure\Persistence;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

final class UserQueries
{
    public function forTenant(
        int $tenantId,
    ): Collection {
        return User::query()
            ->where('tenant_id', $tenantId)
            ->get();
    }
}
