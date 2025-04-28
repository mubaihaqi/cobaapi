<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WeatherController extends Controller
{
    public function getWeather()
    {
        $city = 'Jakarta'; // bisa diganti
        $apiKey = config('services.openweathermap.key');

        // dd($apiKey);
        $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [
            'q' => $city,
            'appid' => $apiKey,
            'units' => 'metric', // biar suhu dalam Celcius
        ]);

        if ($response->successful()) {
            $weatherData = $response->json();
            Log::info('Weather API Response:', $weatherData);
            return view('weather', ['weather' => $weatherData]);
        } else {
            Log::error('Weather API Error:', ['response' => $response->body()]);
            return response()->json(['error' => 'Gagal ambil data cuaca'], 500);
        }
    }

    public function getWeatherByCoordinates()
    {
        // Ambil data lat dan lon dari query string
        $lat = request()->input('lat');
        $lon = request()->input('lon');
        $apiKey = config('services.openweathermap.key');

        // Request ke API OpenWeatherMap dengan lat dan lon
        $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [
            'lat' => $lat,
            'lon' => $lon,
            'appid' => $apiKey,
            'units' => 'metric', // biar suhu dalam Celcius
        ]);

        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json(['error' => 'Gagal ambil data cuaca'], 500);
        }
    }
}
