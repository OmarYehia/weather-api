<?php
require_once("config.php");
function my_autoloader($class) {    
    $path = __DIR__.'/Model/' . $class . '.php';
    $path2 = __DIR__.'/twilio-php-main/src/Twilio/Rest/Rest/' . $class . '.php';
    if (file_exists($path)) { 
        require_once($path);
    } else if (file_exists($path2)) {
        require_once($path2);
    } 
    else {
       throw new Exception("Class ".$class." isn't found");
                return false;
    }
}

spl_autoload_register('my_autoloader');

