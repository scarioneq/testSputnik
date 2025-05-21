<?php

namespace App\Services;

use App\DataTransferObject\WishlistData;
use App\Models\User;
use App\Models\Wishlist;
use App\ViewModels\WishlistViewModel;
use Illuminate\Support\Facades\Gate;

class WishlistService
{
    public function addToWishlist(User $user, WishlistData $data): Wishlist
    {
        if ($user->wishlists()->where('place_id', $data->place_id)->exists()) {
            abort(422, 'Место уже в списке желаемого');
        }

        if ($user->wishlists()->count() >= 3) {
            abort(422, 'Нельзя добавить более 3 мест');
        }

        return $user->wishlists()->create($data->toArray());
    }

    public function getUserWishlists(User $requestUser, User $targetUser): WishlistViewModel
    {
        Gate::authorize('viewAny', Wishlist::class);

        if (!$requestUser->is_admin && $requestUser->id !== $targetUser->id) {
            abort(403, 'Недостаточно прав');
        }

        $targetUser->load(['wishlists.place']);

        return new WishlistViewModel(
            $targetUser->wishlists,
            $requestUser,
            false
        );
    }

    public function getAllWishlists(User $currentUser): WishlistViewModel
    {
        Gate::authorize('viewAny', Wishlist::class);

        $query = User::with(['wishlists.place']);

        if (!$currentUser->is_admin) {
            $query->where('id', $currentUser->id);
        }

        $users = $query->get()
            ->sortByDesc(fn($user) => $user->id === $currentUser->id ? 0 : 1);

        return new WishlistViewModel(
            $users,
            $currentUser,
            true
        );
    }
}
