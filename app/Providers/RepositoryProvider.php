<?php

namespace App\Providers;

use App\Repositories\EmployeeMySqlRepository;
use App\Repositories\EmployeeRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(EmployeeRepositoryInterface::class, EmployeeMySqlRepository::class);
    }
}
