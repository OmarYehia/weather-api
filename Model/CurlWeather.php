<?php

class CurlWeather extends WeatherProvider {

    public function sendResponse($cityid) {
        $url = str_replace("{{cityid}}", $cityid, __WEATHER_URL);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $response = curl_exec($ch);
        curl_close($ch);
        return json_decode($response, true);   
    }
}
