<?php

namespace App\Providers;

use App\Interfaces\LoginInterface;
use App\Interfaces\ProductInterface;
use App\Repository\LoginRepository;
use App\Repository\ProductRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(LoginInterface::class , LoginRepository::class);
        $this->app->bind(ProductInterface::class , ProductRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
