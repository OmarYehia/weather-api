<?php

use \GuzzleHttp\Client;

class GuzzleWeather extends WeatherProvider {

    public function sendResponse($cityid) {
        $url = str_replace("{{cityid}}", $cityid, __WEATHER_URL);
        $client = new Client();
        $response = $client->get($url);
        return json_decode($response->getBody(), true);   
    }

}
