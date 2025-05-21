<?php

namespace Database\Seeders;

use App\Models\Place;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'login' => 'admin',
            'password' => Hash::make('admin123'),
            'is_admin' => true,
        ]);

        User::create([
            'login' => 'user',
            'password' => Hash::make('user123'),
            'is_admin' => false,
        ]);

        Place::factory(10)->create();
    }
}
