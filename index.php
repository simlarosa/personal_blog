<?php
require_once '/Applications/MAMP/htdocs/personal_blog/core/config/bootstrap.php';

if (!empty($_GET['tag'])) {
    $posts = $postArchive->getAllPostsByTag($_GET['tag']);
   } else {
    $posts = $postArchive->getAllPosts();
   }

include 'view/index.php';


?>