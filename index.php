<?php

ini_set('display_errors', 1);
session_start();
error_reporting(E_ALL);

require_once('vendor/autoload.php');
//require_once ('views/header.html');

//F3 class
$f3 = Base::instance();

//Route
$f3->route('GET /', function () {
    //echo "<h1>Hello World!</h1>";

    $view = new Template();
    echo $view->render("views/home.html");
});

$f3->route('GET|POST /personalinfo', function ($f3) {
    //echo "<h1>Hello World!</h1>";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_SESSION['fname'] = $_POST['fname'];
        $_SESSION['lname'] = $_POST['lname'];
        $_SESSION['age'] = $_POST['age'];
        $_SESSION['gender'] = $_POST['gender'];
        $_SESSION['phone'] = $_POST['phone'];
       $f3 -> reroute('Profile');
    }
    $view = new Template();
    echo $view->render("views/form1.html");
});
$f3->route('GET|POST /Profile', function ($f3) {
    //echo "<h1>Hello World!</h1>";
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_SESSION['bio']=$_POST['bio'];
        $_SESSION['state']=$_POST['state'];
        $_SESSION['seek']=$_POST['seek'];
        $_SESSION['email']=$_POST['email'];
        $f3 -> reroute('interests');
    }
    $f3->set('states',array('Alabama','Alaska','American Samoa','Arizona','Arkansas',
        'California','Colorado','Connecticut','Delaware','District of Columbia',
        'Federated States of Micronesia','Florida','Georgia','Guam','Hawaii',
        'Idaho','Illinois','Indiana','Iowa','Kansas','Kentucky','Louisiana',
        'Maine','Marshall Islands','Maryland','Massachusetts','Michigan','Minnesota',
        'Mississippi','Missouri','Montana','Nebraska','Nevada','New Hampshire','New Jersey',
        'New Mexico','New York','North Carolina','North Dakota','Northern Mariana Islands',
        'Ohio','Oklahoma','Oregon','Palau','Pennsylvania','Puerto Rico','Rhode Island',
        'South Carolina','South Dakota','Tennessee','Texas','Utah','Vermont','Virgin Island',
        'Virginia','Washington','West Virginia','Wisconsin','Wyoming'));
    $view = new Template();
    echo $view->render("views/form2.html");
});
$f3->route('GET|POST /interests', function ($f3) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_SESSION['indoor']=$_POST['indoor'];
        $_SESSION['outdoor']=$_POST['outdoor'];

        $f3->reroute('overview');
    }
    $f3 ->set('outside',array('hiking','biking','swimming','collecting','walking','climbing'));
    $f3 -> set('inside',array('tv','movies','cooking','board games','puzzles','reading','playing cards','video games'));
    $view = new Template();
    echo $view->render("views/form3.html");
});
$f3->route('GET /overview', function ($f3) {
    $view = new Template();
    echo $view->render("views/summary.html");
    session_destroy();
}
);

$f3->run();