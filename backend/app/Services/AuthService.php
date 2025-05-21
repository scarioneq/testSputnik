<?php

namespace App\Services;

use App\DataTransferObject\LoginData;
use App\DataTransferObject\RegisterData;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthService
{
    public function register(RegisterData $data): array
    {
        $user = User::create([
            'login' => $data->login,
            'password' => bcrypt($data->password),
            'is_admin' => false,
        ]);

        $token = JWTAuth::fromUser($user);

        return [
            'user' => $user,
            'token' => $token
        ];
    }

    public function login(LoginData $data): array
    {
        if (!$token = Auth::attempt(['login' => $data->login, 'password' => $data->password])) {
            abort(401, 'Неверные учетные данные');
        }

        return [
            'user' => Auth::user(),
            'token' => $token
        ];
    }

    public function logout(): void
    {
        Auth::logout();
    }

    public function me()
    {
        return Auth::user();
    }
}
