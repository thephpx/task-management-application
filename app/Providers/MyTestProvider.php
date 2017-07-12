<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Company\Company;

class MyTestProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        \App::singleton(Company::class, function (){
            return new Company(config('services.company.name'));
        });
    }
}
