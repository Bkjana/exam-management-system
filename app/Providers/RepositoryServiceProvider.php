<?php

namespace App\Providers;

use App\Repositories\AdminRepository;
use App\Repositories\Interfaces\AdminRepoInterface;
use App\Repositories\Interfaces\StudentRepoInterface;
use App\Repositories\Interfaces\TeacherRepoInterface;
use App\Repositories\Interfaces\UserRepoInterface;
use App\Repositories\StudentRepository;
use App\Repositories\TeacherRepository;
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

        $this->app->bind(TeacherRepoInterface::class,TeacherRepository::class);

        $this->app->bind(StudentRepoInterface::class, StudentRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
