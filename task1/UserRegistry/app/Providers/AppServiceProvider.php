<?php

namespace App\Providers;

use App\Repository\UserRepository;
use App\Repository\IUserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(IUserRepository::class, UserRepository::class);
    }

    public function boot()
    {
        
    }
}
