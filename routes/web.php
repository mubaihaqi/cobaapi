<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Env;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/weather', [WeatherController::class, 'getWeather']);

Route::get('/weather-gps', [WeatherController::class, 'getWeatherByCoordinates']);

Route::get('/testenv', function () {
    dd([
        'env' => env('OPENWEATHERMAP_API_KEY'),
        'config' => config('services.openweathermap.key'),
    ]);
});
