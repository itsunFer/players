<?php

namespace App\Providers;


// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Tournaments;
use App\Policies\TournamentsPolicy;
use App\Models\Teams;
use App\Policies\TeamsPolicy;
use App\Models\Players;
use App\Policies\PlayersPolicy;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Tournaments::class => TournamentsPolicy::class,
        Teams::class => TeamsPolicy::class,
        Players::class => PlayersPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
