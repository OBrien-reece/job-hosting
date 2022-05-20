<?php
//initialize confog file
require_once ('config/config.php');

//initialize helpers
require_once ('helpers/mvc_helpers.php');

spl_autoload_register(function($class) {
    require_once ('libraries/' .$class. '.php');
});
