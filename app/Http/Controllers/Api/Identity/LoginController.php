<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Identity;

use Illuminate\Http\JsonResponse;
use App\Http\Requests\Identity\LoginRequest;
use App\Domains\Identity\Application\DTOs\LoginCommand;
use App\Domains\Identity\Application\UseCases\LoginUser;
use App\Domains\Identity\Application\Exceptions\InvalidCredentialsException;

final class LoginController
{
    public function __invoke(
        LoginRequest $request,
        LoginUser $loginUser,
    ): JsonResponse {
        try {
            $authenticatedUser = $loginUser->execute(
                new LoginCommand(
                    email: $request->validated('email'),
                    password: $request->validated('password'),
                )
            );

            return response()->json([
                'data' => [
                    'user_id' => $authenticatedUser->userId,
                    'tenant_id' => $authenticatedUser->tenantId,
                    'name' => $authenticatedUser->name,
                    'email' => $authenticatedUser->email,
                ],
            ]);
        } catch (InvalidCredentialsException) {
            return response()->json([
                'message' => 'Invalid credentials.',
            ], 401);
        }
    }
}
