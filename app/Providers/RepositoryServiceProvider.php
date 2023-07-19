<?php

namespace App\Providers;

use App\Repositories\AdminRepository;
use App\Repositories\Interfaces\AdminRepoInterface;
use App\Repositories\Interfaces\UserRepoInterface;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepoInterface::class,UserRepository::class);

        $this->app->bind(AdminRepoInterface::class,AdminRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
