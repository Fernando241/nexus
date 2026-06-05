<?php

namespace App\Domains\Product\Infrastructure\Persistence;

use Illuminate\Database\Eloquent\Model;

class EloquentProduct extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'tenant_id',
        'name',
    ];
}
