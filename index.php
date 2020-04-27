<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('vendor/autoload.php');

//F3 class
$f3 = Base::instance();

//Route
$f3->route('GET /', function () {
    //echo "<h1>Hello World!</h1>";
    $view = new Template();
    echo $view->render("views/home.html");
}
);

$f3->run();