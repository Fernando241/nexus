<?php

namespace App\Http\Controllers\Api\Identity;

use App\Http\Controllers\Controller;
use App\Domains\Identity\Application\Security\CurrentUser;
use Illuminate\Http\JsonResponse;

class MeController extends Controller
{
    public function __invoke(CurrentUser $currentUser): JsonResponse
    {
        return response()->json([
            'id' => $currentUser->id(),
            'email' => $currentUser->email(),
        ]);
    }
}
