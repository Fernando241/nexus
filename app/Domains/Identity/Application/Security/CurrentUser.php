<?php

namespace App\Domains\Identity\Application\Security;

interface CurrentUser
{
    public function id(): int;

    public function email(): string;
}

