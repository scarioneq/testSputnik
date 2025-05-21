<?php

namespace App\Http\Controllers;

use App\DataTransferObject\LoginData;
use App\DataTransferObject\RegisterData;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function __construct(private AuthService $service) {}

    public function register(RegisterData $data)
    {
        $result = $this->service->register($data);
        return response()->json($result, 201);
    }

    public function login(LoginData $data)
    {
        return response()->json($this->service->login($data));
    }

    public function logout()
    {
        $this->service->logout();
        return response()->json("Вы успешно вышли из системы", 200);
    }

    public function me()
    {
        return response()->json($this->service->me());
    }
}

