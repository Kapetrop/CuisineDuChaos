<?php

ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => '0688553.tim-cstj.ca',
    'path' => '/',
    'secure' => true,
    'httponly' => true
]);

session_start();
// print_r($_SESSION);
if(!isset($_SESSION['last_regeberation'])){

    session_regenerate_id(true);
    $_SESSION['last_regeberation'] = time();
}else {
    $interval = 60 * 30;

    if(time() - $_SESSION['last_regeberation'] >= $interval){
        session_regenerate_id(true);
        $_SESSION['last_regeberation'] = time();
    }
   
}