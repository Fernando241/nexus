<?php

namespace App\Http\Controllers\Api\Identity;

use App\Domains\Identity\Application\UseCases\ListUsers;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

final class ListUsersController extends Controller
{
    public function __invoke(
        ListUsers $useCase
    ): JsonResponse {
        $users = $useCase->execute();

        return response()->json($users);
    }
}
