<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(private UserService $service) {}

    public function me()
    {
        return response()->json($this->service->getCurrentUser());
    }
    public function index()
    {
        return response()->json($this->service->getFilteredUsers());
    }
}
