<?php

namespace App\Domains\Identity\Infrastructure\Security;

use App\Domains\Identity\Application\Exceptions\UnauthenticatedException;
use App\Domains\Identity\Application\Security\CurrentUser;
use Illuminate\Support\Facades\Auth;

class LaravelCurrentUser implements CurrentUser
{
    public function id(): int
    {
        $user = Auth::user();

        if ($user === null) {
            throw new UnauthenticatedException();
        }

        return $user->id;
    }

    public function email(): string
    {
        $user = Auth::user();

        if ($user === null) {
            throw new UnauthenticatedException();
        }

        return $user->email;
    }
}
