<?php

include_once("./model/Comment.php");

function addComment($connect){
    $comment = new Comment();
    $comment->setContent($_POST['comment']);
    $comment->setUser($_SESSION['user']->getId());
    $comment->setPost($_POST['idPost']);

    $message = $comment->addComment($connect);
    return $message;
}

function getCommentsByPost($connect, $idPost){
    $comment = new Comment();
    $listComments = $comment->getCommentsByPost($connect, $idPost);
    return $listComments;
}

function deleteComment($connect, $idComment){
    $comment = new Comment();
    $message = $comment->deleteComment($connect, $idComment);
    return $message;
}












?>