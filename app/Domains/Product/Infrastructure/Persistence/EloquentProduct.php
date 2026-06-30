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
        'presentation',
        'description',
        'indications',
        'contraindications',
        'ingredients',
        'purchase_price',
        'sale_price',
        'image_path',
    ];

    protected $casts = [
        'ingredients' => 'array',
        'purchase_price' => 'decimal:2',
        'sale_price' => 'decimal:2',
    ];

    /** @use HasFactory<ProductFactory> */
    protected static function newFactory(): ProductFactory
    {
        return ProductFactory::new();
    }
}
