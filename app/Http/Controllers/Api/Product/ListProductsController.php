<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Domains\Product\Application\UseCases\ListProducts;
use Illuminate\Http\JsonResponse;

class ListProductsController extends Controller
{
    public function __invoke(
        ListProducts $listProducts,
    ): JsonResponse {
        return response()->json(
            $listProducts->execute()
        );
    }
}
