<?php

namespace App\Dal\Models;

use Illuminate\Database\Eloquent\Model;

class WeatherQuery extends Model
{
    protected $fillable = ['user_id', 'zip_code', 'min_temp', 'max_temp', 'city', 'response'];
}