<?php
//require_once 'core/post-repository.php';

require_once '/Applications/MAMP/htdocs/personal_blog/core/model/User.php'; 
require_once '/Applications/MAMP/htdocs/personal_blog/core/model/UserRepository.php'; 
require_once '/Applications/MAMP/htdocs/personal_blog/core/model/PostRepository.php';
require_once '/Applications/MAMP/htdocs/personal_blog/core/model/Post.php';
require_once '/Applications/MAMP/htdocs/personal_blog/core/config/db_config.php';
require_once '/Applications/MAMP/htdocs/personal_blog/core/services/AuthenticationController.php';

$postArchive = new PostRepository;
$userRepo = new UserRepository($mysqli);
$authenticator = new AutenthicationController($userRepo);


session_start();
