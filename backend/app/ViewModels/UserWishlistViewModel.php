<?php
namespace App\ViewModels;

use App\Models\User;
use App\Shared\ViewModel;

class UserWishlistViewModel extends ViewModel
{
    private $user;
    private $isCurrentUserAdmin;

    public function __construct(User $user, bool $isCurrentUserAdmin)
    {
        $this->user = $user;
        $this->isCurrentUserAdmin = $isCurrentUserAdmin;
    }

    public function user_id(): int
    {
        return $this->user->id;
    }

    public function login(): string
    {
        return $this->user->login;
    }

    public function is_admin(): bool
    {
        return $this->user->is_admin;
    }

    public function places(): array
    {
        return $this->user->wishlists
            ->sortByDesc('created_at')
            ->map(function($wishlist) {
                return [
                    'id' => $wishlist->place->id,
                    'name' => $wishlist->place->name,
                    'latitude' => (float)$wishlist->place->latitude,
                    'longitude' => (float)$wishlist->place->longitude,
                    'added_at' => $wishlist->created_at->toDateTimeString()
                ];
            })
            ->values()
            ->toArray();
    }
}
