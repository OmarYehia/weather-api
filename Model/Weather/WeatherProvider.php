<?php
namespace Model\Weather;

abstract class WeatherProvider implements Weather_Interface {
    public function get_cities() {
        $cities_file = file_get_contents("./resources/EG_city_list.json");
        return json_decode($cities_file, true);
    }
    
    public function get_current_time() {
        date_default_timezone_set("Africa/Cairo");
        $date_time = date("l h:ia") . "</br>" . date("d F, Y");
        return $date_time;
    }

    public function get_weather($cityid) {
        return $this->sendResponse($cityid);
    }
}

?>