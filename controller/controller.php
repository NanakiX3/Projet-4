<?php



//models
include_once("./model/Post.php");



function addPost($connect){
    $post = new Post();
    $post->setTitle($_POST["title"]);
    $post->setContent($_POST["content"]);

    $message = $post->insertPost($connect);
    return $message;
}

function getAllPosts($connect){
    $post = new Post();
    $listPosts = $post->allPosts($connect);

    return $listPosts;
}

function getOnePost($connect, $id){
    $post = new Post();
    $onePost = $post->getPost($connect, $id);

    return $onePost;
}

function getLastFivePosts($connect){
    $post = new Post();
    $listLastFivePosts = $post->getLastFivePosts($connect);
    
    return $listLastFivePosts;
}