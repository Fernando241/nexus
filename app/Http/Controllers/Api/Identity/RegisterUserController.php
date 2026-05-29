<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Identity;

use App\Domains\Identity\Application\UseCases\RegisterUser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/* Controlador no decide negocio solo:
    - recibe HTTP
    - extrae datos
    - llama al caso de uso
    - devuelve la respuesta HTTP */

final class RegisterUserController
{
    public function __invoke(           // Inyectamos el caso de uso directamente, lo que facilita la prueba y mantiene el controlador delgado.
        Request $request,
        RegisterUser $registerUser,     // Inyectamos el caso de uso directamente, lo que facilita la prueba y mantiene el controlador delgado.
    ): JsonResponse {
        $result = $registerUser->execute(
            tenantName: $request->string('tenant_name')->toString(),
            userName: $request->string('user_name')->toString(),
            email: $request->string('email')->toString(),
        );

        return response()->json([
            'message' => 'User registered successfully.',
            'data' => $result,
        ]);
    }
}
