<?php

require_once 'UserRepository.php';
require_once '/Applications/MAMP/htdocs/personal_blog/core/config/db_config.php';
require_once '/Applications/MAMP/htdocs/personal_blog/core/services/AuthenticationController.php';
require_once '/Applications/MAMP/htdocs/personal_blog/core/model/Post.php';
require_once '/Applications/MAMP/htdocs/personal_blog/core/model/PostRepository.php';

$userRepo = new UserRepository($mysqli);
$authenticator = new AutenthicationController($userRepo);
$postRepo = new PostRepository($userRepo, $mysqli);

$email = "simlarosa@gmail.com";
$title = "Ecco un'altro post";
$content = "Contenuto Test";
$tag = ["Viaggio","Lifestyle"];

$post = new Post($title,$content,$tag, "prova_Link");

/*
if($postRepo->writePostTagToDb(5,3)){
    echo "Riuscito\n";
} else {
    echo "Non Riuscito\n";
}
*/
if($posts = $postRepo->getPost("Prova di post con immagine")){
    echo "Riuscito\n";
    print_r($posts);
} else {
    echo "Fallito\n";
}




?>