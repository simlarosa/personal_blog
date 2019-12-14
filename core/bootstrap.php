<?php
require_once 'core/post-repository.php';
require_once __DIR__ . '/login-handler.php';
require_once 'core/User.php';

$user = new User($email = 'ciao', $password = 'pippo');


session_start();

