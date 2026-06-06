<?php

namespace App\Domains\Product\Infrastructure\Persistence;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EloquentProduct extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'tenant_id',
        'name',
    ];
    /** @use HasFactory<ProductFactory> */
    protected static function newFactory(): ProductFactory
    {
        return ProductFactory::new();
    }
}
