<?php 
require_once '/Applications/MAMP/htdocs/personal_blog/core/config/bootstrap.php';

$authenticator->logoutUser();
header("location: index.php");