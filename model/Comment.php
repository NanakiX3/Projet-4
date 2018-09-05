<?php

class Comment{
    protected $id;
    protected $content;
    protected $dateComment;
    protected $answer;
    protected $user;
    protected $post;
   
    public function addComment($connect){
        try{
            $req = $connect->prepare("INSERT INTO comment (content, dateComment, id_user, id_post) VALUES (:content, NOW(), :user, :post)");
            $req->bindParam(":content", $this->content, PDO::PARAM_STR);
            $req->bindParam(":user", $this->user, PDO::PARAM_INT);
            $req->bindParam(":post", $this->post, PDO::PARAM_INT);
            $req->execute();
            $message = "Votre commentaire a bien été posté !";
            return $message;
        }catch(PDOException $e){
            return "Votre commentaire n'a pas été posté, en voici la raison : ".$e->getMessage();
        }
    }

    public function getCommentsByPost($connect, $idPost){
        $req = $connect->query("SELECT id, content, dateComment, id_user, id_post FROM comment WHERE id_post = ".$idPost." ORDER BY dateComment asc ");
        $req->setFetchMode(PDO::FETCH_OBJ);
        $listComments = array();
        while ($obj = $req->fetch()){
            $comment = new Comment();
            $comment->setId($obj->id);
            $comment->setContent($obj->content);
            $comment->setDateComment($obj->dateComment);
            $user = new User();
            $comment->setUser($user->getUserById($connect, $obj->id_user));
            $post = new Post();
            $comment->setPost($post->getPost($connect, $obj->id_post));
            $listComments[] = $comment;
        }
        return $listComments;
    }

    public function deleteComment($connect, $id){
    try{
        $req = $connect->prepare("DELETE FROM comment WHERE id = ".$id);
        $req->execute();
        $message = "Ce commentaire a bien été supprimé !";
        return $message;
    }catch(PDOException $e){
        return "Ce commentaire n'a pas été supprimé, en voici la raison : ".$e->getMessage();
    }
        
    }

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