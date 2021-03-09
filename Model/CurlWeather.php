<?php

class CurlWeather implements Weather_Interface {

    public function __construct() {
       
    }

    public function get_cities() {
        $cities_file = file_get_contents("./resources/EG_city_list.json");
        return json_decode($cities_file, true);
    }

    public function get_weather($cityid) {
        //$url2 = "http://api.openweathermap.org/data/2.5/weather?id=" .$cityid."&lang=en&units=metric&APPID=7d938c2e126554bcd611e9d95495e0ad";
        $url = str_replace("{{cityid}}", $cityid, __WEATHER_URL);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $response = curl_exec($ch);
        curl_close($ch);
        return json_decode($response, true);   
    }

    public function get_current_time() {
        date_default_timezone_set("Africa/Cairo");
        $date_time = date("l h:ia") . "</br>" . date("d F, Y");
        return $date_time;
    }

}
