<?php
namespace App\ViewModels;

use App\Models\User;
use Illuminate\Support\Collection;
use App\Shared\ViewModel;

class UserWishlistCollectionViewModel extends ViewModel
{
    private $users;
    private $currentUser;

    public function __construct(Collection $users, User $currentUser)
    {
        $this->users = $users;
        $this->currentUser = $currentUser;
    }

    public function wishlists(): array
    {
        return $this->users
            ->map(fn($user) => new UserWishlistViewModel(
                $user,
                $this->currentUser->is_admin
            ))
            ->map->toArray()
            ->values()
            ->toArray();
    }

    public function count(): int
    {
        return $this->users->count();
    }
}
