<?php
require_once "core/bootstrap.php";

if($_POST['email'] && $_POST['password']) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(loginUser($email, $password)){
        header("location: index.php");
    } else {
        echo "Dati non corretti";
    }
}


include 'view/login.php';



?>