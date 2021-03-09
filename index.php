<?php
require "vendor/autoload.php";
ini_set('memory_limit', '-1');

/* Provider pattern
    Pass "Guzzle" or "Curl" into WeatherProvider::create to use either methods
*/
$weather = WeatherProvider::create("Guzzle");
$egyption_cities = $weather->get_cities();

if (isset($_POST["submit"])) {
    $city_id = $_POST["city"];
    try {
        $result = $weather->get_weather($city_id);
    } catch (Exception $e) {
        echo $e;
    }
    
} 
else if(isset($_POST["send"])) {
    $number = $_POST["number"];
    $sms = new SMS();
    try {
        $sms->send($number);
    } catch (Exception $e) {
        echo $e;
    }
    
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Weather API</title>
        <link rel="stylesheet" href="resources/style.css">
    </head>
    <body>
    
    <div class="container">
        <div class="weather-info">
            <?php if(isset($result)) {?>
                <h1><?php echo $result["name"]?> Weather Status</h1>
                <h3><?php echo $weather->get_current_time()?></h3>
                <p><?php echo $result["weather"][0]["description"] ?></p>
                <img src="http://openweathermap.org/img/wn/<?php echo $result["weather"][0]["icon"] ?>@2x.png" alt="">
                <p>Min = <?php echo $result["main"]["temp_min"] ?> &deg;C</p>
                <p>Max = <?php echo $result["main"]["temp_max"] ?> &deg;C</p>
                <p>Humidity = <?php echo $result["main"]["humidity"] ?>%</p>
                <p>Wind = <?php echo $result["wind"]["speed"] ?> km/h</p>
            <?php }?>
        </div>
        <form action="" method="POST">
            <select name="city" id="city">
                <?php
                    foreach($egyption_cities as $city) {
                        echo "<option value='" . $city["id"] ."'>" . $city["name"] . "</option>";
                    }
                ?>
            </select>
            <button type="submit" name="submit"> Get Weather </button>    
        </form>
        
        <form action="" method="post">
            <input type="text" name="number">
            <button type="sumbit" name="send"> SMS Info</button>
        </form>
        <div class="message-result">
            <?php if(isset($number)) {?>
                <h1>Message sent successfully!</h1>
            <?php }?>
        </div>
    </div>
    

    </body>
</html>
