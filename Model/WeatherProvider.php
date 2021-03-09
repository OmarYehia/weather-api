<?php

abstract class WeatherProvider {
    public static function create($type) {
        if ($type === "Guzzle") {
            return new GuzzleWeather();
        } else if ($type === "Curl") {
            return new CurlWeather();
        }
    }
}

?>