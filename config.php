<?php
define("__WEATHER_URL","http://api.openweathermap.org/data/2.5/weather?id={{cityid}}&lang=en&units=metric&APPID={{apiid}}");
define("__CITIES_FILE", "resources/city.list.json");

// SMS
define("__TWILIO_ACCOUNT_SID", "{{accountsid}}");
define("__TWILIO_AUTH_TOKEN", "{{authtoken}}");
define("__TWILIO_MY_PHONE_NUMBER", "{{phonenumber}}");
