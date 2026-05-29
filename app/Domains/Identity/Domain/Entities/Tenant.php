<?php

declare(strict_types=1);

namespace App\Domains\Identity\Domain\Entities;

final class Tenant // Evita herencia arbitraria y evitamos extensiones no deseadas a la vez que protegemos el modelo del dominio
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $name, // hace que el objeto sea inmutable despues de creado, lo que reduce bugs, evita mutaciones invisibles y hace al dominio mas predecible.
        public readonly bool $active = true, // un tenant puede suspenderse, lo que puede ser útil para controlar el acceso a los recursos asociados a ese tenant sin eliminarlo completamente de la base de datos.
    ) {
    }
}
