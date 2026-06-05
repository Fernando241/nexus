<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductRequest;
use App\Domains\Product\Application\UseCases\CreateProduct;
use Illuminate\Http\JsonResponse;

class CreateProductController extends Controller
{
    public function __invoke(
        CreateProductRequest $request,
        CreateProduct $createProduct,
    ): JsonResponse {
        $product = $createProduct->execute(
            name: $request->string('name')->toString(),
        );

        return response()->json($product, 201);
    }
}
