<?php

namespace App\Providers;

use App\Entities\Employee;
use App\Entities\Guest;
use App\Entities\Spa;
use App\Entities\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        Relation::morphMap([
            'User' => User::class,
            'Employee' => Employee::class,
            'Guest' => Guest::class,
            'Spa' => Spa::class,
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
