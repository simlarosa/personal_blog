<?php

require_once 'UserRepository.php';
require_once '/Applications/MAMP/htdocs/personal_blog/core/config/db_config.php';
require_once '/Applications/MAMP/htdocs/personal_blog/core/services/AuthenticationController.php';

$userRepo = new UserRepository($mysqli);
$authenticator = new AutenthicationController($userRepo);

$email = "pippo@gmail.com";
$password = "74666399sSs";
$name = "Pippo";
$role = "Reader";

if($authenticator->loginUser($email,$password)){
    echo "Login effettuata\n";
    print_r($_SESSION);
} else {
    echo "Login fallita\n";
}


?>