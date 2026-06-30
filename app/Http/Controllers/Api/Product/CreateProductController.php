<?php

namespace App\Http\Controllers\Api\Product;

use App\Domains\Product\Application\UseCases\CreateProduct;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductRequest;
use Illuminate\Http\JsonResponse;

class CreateProductController extends Controller
{
    public function __invoke(
        CreateProductRequest $request,
        CreateProduct $createProduct,
    ): JsonResponse {
        $product = $createProduct->execute(
            $request->toCommand()
        );

        return response()->json($product, 201);
    }
}
