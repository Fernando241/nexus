<?php

namespace App\Http\Controllers\Api\Identity;

use App\Domains\Identity\Application\UseCases\GetCurrentTenant;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

final class TenantController extends Controller
{
    public function __invoke(
        GetCurrentTenant $useCase,
        ): JsonResponse
    {
        $tenant = $useCase->execute();

        return response()->json([
            'tenant_id' => $tenant->tenantId,
        ]);
    }
}
