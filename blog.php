<?php
require_once '/Applications/MAMP/htdocs/personal_blog/core/config/bootstrap.php';

if($_GET['post']){
    $post = $postRepo->getPost($_GET['post']);
    include 'view/blog_post.php';
} else {
    if (!empty($_GET['tag'])) {
        $posts = $postRepo->getAllPostsByTag($_GET['tag']);
       } else {
        $posts = $postRepo->getAllPosts();
       }
    
    include 'view/blog.php';
}





?>