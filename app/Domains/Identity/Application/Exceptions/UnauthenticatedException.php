<?php

namespace App\Domains\Identity\Application\Exceptions;

use RuntimeException;

class UnauthenticatedException extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('No authenticated user found.');
    }
}
