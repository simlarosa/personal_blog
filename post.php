<?php

require_once "core/bootstrap.php";

if(($_POST['Title'] && $_POST['Content'] && $_POST['Tag'])){
    $tagNoSpace = str_replace(' ', '', $_POST['Tag']);
    $tag = explode(',', $tagNoSpace);
    $postArchive->writePostToFile($_POST['Title'], $_POST['Content'], $tag);
    header("location: index.php");
}

include 'view/post.php';

?>