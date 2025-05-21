<?php

namespace App\ViewModels;

use App\Models\User;
use Illuminate\Support\Collection;
use App\Shared\ViewModel;

class WishlistViewModel extends ViewModel
{
    private $data;
    private $isGrouped;
    private $currentUser;

    public function __construct($data, User $currentUser, bool $isGrouped = true)
    {
        $this->data = $data;
        $this->currentUser = $currentUser;
        $this->isGrouped = $isGrouped;
    }

    public function toResponse(): array
    {
        return $this->isGrouped
            ? $this->formatGroupedResponse()
            : $this->formatUngroupedResponse();
    }

    private function formatGroupedResponse(): array
    {
        $users = $this->data instanceof Collection
            ? $this->data
            : collect([$this->data]);

        $wishlists = $users->map(function($user) {
            return [
                'user_id' => $user->id,
                'login' => $user->login,
                'is_admin' => $user->is_admin,
                'places' => $this->formatPlaces($user->wishlists)
            ];
        });

        return [
            'wishlists' => $wishlists->values()->toArray(),
            'count' => $wishlists->count()
        ];
    }

    private function formatUngroupedResponse(): array
    {
        $wishlists = $this->data instanceof Collection
            ? $this->data
            : collect([$this->data]);

        return [
            'places' => $this->formatPlaces($wishlists)
        ];
    }

    private function formatPlaces($wishlists): array
    {
        return $wishlists
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
