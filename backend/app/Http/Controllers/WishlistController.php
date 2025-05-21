<?php

namespace App\Http\Controllers;

use App\DataTransferObject\WishlistData;
use App\Models\User;
use App\Services\WishlistService;
use Illuminate\Http\JsonResponse;

class WishlistController extends Controller
{
    public function __construct(private WishlistService $service) {}

    public function store(WishlistData $data): JsonResponse
    {
        $wishlist = $this->service->addToWishlist(auth()->user(), $data);
        return response()->json($wishlist, 201);
    }

    public function userWishlists(User $user): JsonResponse
    {
        $viewModel = $this->service->getUserWishlists(auth()->user(), $user);
        return response()->json($viewModel->toResponse());
    }

    public function index(): JsonResponse
    {
        $viewModel = $this->service->getAllWishlists(auth()->user());
        return response()->json($viewModel->toResponse());
    }
}
