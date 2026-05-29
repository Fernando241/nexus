<?php

declare(strict_types=1);

namespace App\Http\Requests\Identity;

use Illuminate\Foundation\Http\FormRequest;

final class RegisterUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, string>>
     */
    public function rules(): array
    {
        return [
            'tenant_name' => [
                'required',
                'string',
                'max:120',
            ],

            'user_name' => [
                'required',
                'string',
                'max:120',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email',
            ],
        ];
    }
}
