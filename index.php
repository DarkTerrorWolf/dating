<?php

ini_set('display_errors', 1);
session_start();
error_reporting(E_ALL);

require_once('vendor/autoload.php');
require_once("model/data-layer.php");

//F3 class
$f3 = Base::instance();
$validator = new Validate();
$controller = new Controller($f3,$validator);
//Route
$f3->route('GET /', function () {
    $GLOBALS['controller'] -> home();
});

$f3->route('GET|POST /personalinfo', function ()  {
    $GLOBALS['controller'] -> personalInfo();
});
$f3->route('GET|POST /Profile', function ($f3) {
    $GLOBALS['controller'] -> profile();
});
$f3->route('GET|POST /interests', function ($f3) {
    $GLOBALS['controller'] -> interests();
});
$f3->route('GET|POST /overview', function () {
    $GLOBALS['controller'] -> overview();
});

$f3->run();