<?php
require_once 'core/bootstrap.php';

if (!empty($_GET['tag'])) {
    $posts = $postArchive->getAllPostsByTag($_GET['tag']);
   } else {
    $posts = $postArchive->renderPosts();
   }

include 'view/index.php';


?>