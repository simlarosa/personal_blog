<?php
//require_once 'core/post-repository.php';

require_once 'core/User.php';
require_once 'core/Post.php';

$user = new User($email = 'ciao', $password = 'pippo');
$postArchive = new Posts;


session_start();

