<?php

namespace App\Domains\Identity\Application\Security;

interface CurrentTenant
{
    public function id(): int;
}
