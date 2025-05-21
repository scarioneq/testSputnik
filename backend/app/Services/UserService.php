<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function getCurrentUser()
    {
        return auth()->user();
    }

    public function getFilteredUsers()
    {
        $query = User::query();
        if (!auth()->user()->is_admin) {
            $query->where('id', auth()->id());
        }
        return $query->get();
    }
}
