<?php
namespace App\Domains\Identity\UseCases;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterUser
{
    public function execute(array $data): User
    {
        $user = User::create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password']),
        ]);
        
        //Rol por defecto (placeholder lógico)
        // $user->assignRole('user');

        return $user;
    }
}