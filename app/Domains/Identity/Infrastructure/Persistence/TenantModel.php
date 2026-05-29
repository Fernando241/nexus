<?php

declare(strict_types=1);

namespace App\Domains\Identity\Infrastructure\Persistence;

use Illuminate\Database\Eloquent\Model;

final class TenantModel extends Model
{
    protected $table = 'tenants';

    protected $fillable = [
        'name',
        'active',
    ];
}
