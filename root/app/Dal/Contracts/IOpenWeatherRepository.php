<?php

namespace App\Dal\Contracts;

interface IOpenWeatherRepository
{
    public function getWeatherByZipCode($zipCode);
}