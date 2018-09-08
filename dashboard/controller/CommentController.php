<?php

include_once("../model/Comment.php");

function deleteComment($idComment){
    $comment = new Comment();
    $message = $comment->deleteComment($idComment);
    return $message;
}












?>