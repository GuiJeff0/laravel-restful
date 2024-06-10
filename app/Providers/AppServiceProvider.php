<?php

namespace App\Providers;
use App\EmployeeRepository\EmployeeImplementation;
use App\EmployeeRepository\EmployeeInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(EmployeeInterface::class,EmployeeImplementation::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
