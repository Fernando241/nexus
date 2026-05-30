<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Identity;

use Illuminate\Http\JsonResponse;
use App\Http\Requests\Identity\RegisterUserRequest;
use App\Domains\Identity\Application\UseCases\RegisterUser;
use App\Domains\Identity\Application\DTOs\RegisterUserCommand;

final class RegisterUserController
{
    public function __invoke(
        RegisterUserRequest $request,
        RegisterUser $registerUser,
    ): JsonResponse {
        $command = new RegisterUserCommand(
            tenantName: $request->validated('tenant_name'),
            userName: $request->validated('user_name'),
            password: $request->validated('password'),
            email: $request->validated('email'),
        );

        $result = $registerUser->execute($command);

        return response()->json([
            'message' => 'User registered successfully.',
            'data' => $result,
        ], 201);
    }
}
