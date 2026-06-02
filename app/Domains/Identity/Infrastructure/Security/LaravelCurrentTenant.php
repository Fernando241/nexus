<?php

namespace App\Domains\Identity\Infrastructure\Security;

use App\Domains\Identity\Application\Security\CurrentTenant;
use App\Domains\Identity\Application\Exceptions\UnauthenticatedException;
use Illuminate\Support\Facades\Auth;

final class LaravelCurrentTenant implements CurrentTenant
{
    public function id(): int
    {
        $user = Auth::user();

        if (! $user) {
            throw new UnauthenticatedException();
        }

        return $user->tenant_id;
    }
}
