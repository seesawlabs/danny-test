<?php

namespace App\Providers;

use App\Bzl;
use App\Bzl\Contracts as BzlContracts;
use App\Dal\Contracts as DalContracts;
use App\Dal\Eloquent;
use App\Dal\Http;
use App\Validators\ZipValidator;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function boot()
    {
        \Validator::resolver(function ($translator, $data, $rules, $messages) {
            return new ZipValidator($translator, $data, $rules, $messages);
        });
    }

    public function register()
    {
        //Data Access Layer
        $this->app->bind(DalContracts\IUserRepository::class, Eloquent\UserRepository::class);
        $this->app->bind(DalContracts\IWeatherQueryRepository::class, Eloquent\WeatherQueryRepository::class);
        $this->app->bind(DalContracts\IOpenWeatherRepository::class, Http\OpenWeatherRepository::class);

        //Business Logic Layer
        $this->app->bind(BzlContracts\IWeatherQueries::class, Bzl\WeatherQueries::class);
    }
}
