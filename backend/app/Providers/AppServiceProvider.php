<?php

namespace App\Providers;

use App\Models\Place;
use App\Models\User;
use App\Models\Wishlist;
use App\Polices\PlacePolicy;
use App\Polices\UserPolicy;
use App\Polices\WishlistPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(Place::class, PlacePolicy::class);
        Gate::policy(User::class, UserPolicy::class);
        Gate::policy(Wishlist::class, WishlistPolicy::class);
    }
}
