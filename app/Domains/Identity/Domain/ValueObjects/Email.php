<?php

declare(strict_types=1);

namespace App\Domains\Identity\Domain\ValueObjects;

use InvalidArgumentException;

// Asi lo convertimos en un dato inteligente - el email se valida solo,
//la regla vive solo en un lugar,
//y se evita repetir la validacion en todo el sistema.

final class Email
{
    public function __construct(
        public string $value
    ) {
        $this->validate($value);
    }

    private function validate(string $value): void
    {
        if (! filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Invalid email address.');
        }
    }
}
