<?php

use \GuzzleHttp\Client;

class GuzzleWeather implements Weather_Interface {


    public function get_cities() {
        $cities_file = file_get_contents("./resources/EG_city_list.json");
        return json_decode($cities_file, true);
    }

    public function get_weather($cityid) {
        $url = str_replace("{{cityid}}", $cityid, __WEATHER_URL);
        $client = new Client();
        $response = $client->get($url);
        return json_decode($response->getBody(), true);   
    }

    public function get_current_time() {
        date_default_timezone_set("Africa/Cairo");
        $date_time = date("l h:ia") . "</br>" . date("d F, Y");
        return $date_time;
    }

}
