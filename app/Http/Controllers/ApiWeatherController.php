<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Exception;

class ApiWeatherController extends Controller
{
    public function authenticateKey()
    {
        try {
            $head = [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ];

            $url = 'https://api.hgbrasil.com/weather?key='. env('KEY_API_WEATHER');
            $response = Http::timeout(150)->withHeaders($head)->get($url);

            return $response->json();

        } catch (Exception $e) {
            LibraryController::recordError($e);
            return response()->json($e->getMessage());
        }
    }

    public function getCityByIpLocation()
    {
        try {
            $head = [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ];

            $url = 'https://api.hgbrasil.com/weather?key='. env('KEY_API_WEATHER') . '&user_ip=remote';
            $response = Http::timeout(150)->withHeaders($head)->get($url);

            return $response->json();

        } catch (Exception $e) {
            LibraryController::recordError($e);
            return response()->json($e->getMessage());
        }
    }

    public function getCityByName(Request $request)
    {
        try {
            $head = [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ];

            $city_name = $request->city_name;

            $url = 'https://api.hgbrasil.com/weather?key='. env('KEY_API_WEATHER') . '&city_name=' . $city_name;
            $response = Http::timeout(150)->withHeaders($head)->get($url);

            return $response->json();

        } catch (Exception $e) {
            LibraryController::recordError($e);
            return response()->json($e->getMessage());
        }
    }
}
