<?php

class Comment{
    protected $id;
    protected $content;
    protected $dateComment;
    protected $answer;
    protected $user;
    protected $post;
   


    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getContent(){
        return $this->content;
    }

    public function setContent($content){
        $this->content = $content;
        return $this;
    }
 
    public function getDateComment(){
        return $this->dateComment;
    }

    public function setDateComment($dateComment){
        $this->dateComment = $dateComment;
        return $this;
    }

    public function getAnswer(){
        return $this->answer;
    }

    public function setAnswer($answer){
        $this->answer = $answer;
        return $this;
    }
 
    public function getUser(){
        return $this->user;
    }

    public function setUser($user){
        $this->user = $user;
        return $this;
    }

    public function getPost(){
        return $this->post;
    }

    public function setPost($post){
        $this->post = $post;
        return $this;
    }
}