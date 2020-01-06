<?php
require_once '/Applications/MAMP/htdocs/personal_blog/core/config/bootstrap.php';


if($_POST['email'] && $_POST['password']) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if($authenticator->loginUser($email, $password)){
        header("location: index.php");
    } else {
        echo "Dati non corretti";
    }
}


include 'view/login.php';
?>