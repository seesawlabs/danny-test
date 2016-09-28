<?php

Route::auth();

Route::get('/', 'IndexController@index');
Route::post('/check-weather', 'IndexController@queryWeather');
Route::get('/history', 'IndexController@history');