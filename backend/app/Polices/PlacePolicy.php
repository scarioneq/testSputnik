<?php

namespace App\Polices;

use App\Models\User;
use App\Models\Place;

class PlacePolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->is_admin;
    }

    public function view(User $user, Place $place): bool
    {
        return true;
    }
}
