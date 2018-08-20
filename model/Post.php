<?php

class Post{
    protected $id;              
    protected $title;          
    protected $content;         
    protected $created_at;     
    protected $update_at;
    protected $user;

    public function allPosts($connect){
        $req = $connect->query("SELECT id, title, content, created_at, update_at, id_user FROM post ORDER BY created_at desc ");
        $req->setFetchMode(PDO::FETCH_OBJ);
        $listPosts = array();
        while ($obj = $req->fetch()){
            $post = new Post();
            $post->setId($obj->id);
            $post->setTitle($obj->title);
            $post->setContent($obj->content);
            $post->setCreatedAt($obj->created_at);
            $post->setUpdateAt($obj->update_at);
            $post->setUser($obj->id_user);
            $listPosts[] = $post;
        }
        return $listPosts;
    }

    public function getPost($connect, $id){
        $req = $connect->query("SELECT id, title, content, created_at, update_at, id_user FROM post WHERE id = ".$id);
        $req->setFetchMode(PDO::FETCH_OBJ);

        $post = new Post();
        while ($obj = $req->fetch()){
            $post->setId($obj->id);
            $post->setTitle($obj->title);
            $post->setContent($obj->content);
            $post->setCreatedAt($obj->created_at);
            $post->setUpdateAt($obj->update_at);
            $post->setUser($obj->id_user);
            
        }
        return $post;
    }

    public function insertPost($connect){
        try{
            $req = $connect->prepare("INSERT INTO post (title, content, created_at, id_user) VALUES (:title, :content, NOW(), 1)");
            $req->bindParam(":title", $this->title, PDO::PARAM_STR);
            $req->bindParam(":content", $this->content, PDO::PARAM_STR);
            $req->execute();
            $message = "Votre billet a bien été enregistré !";
            return $message;
        }catch(PDOException $e){
            return "Votre enregistrement a échoué, en voici la raison : ".$e->getMessage();
        }
    }

    public function getLastFivePosts($connect){
        $req = $connect->query("SELECT id, title, content, created_at, update_at, id_user FROM post ORDER BY created_at desc LIMIT 5");
        $req->setFetchMode(PDO::FETCH_OBJ);
        $listLastFivePosts = array();
        while ($obj = $req->fetch()){
            $post = new Post();
            $post->setId($obj->id);
            $post->setTitle($obj->title);
            $post->setContent($obj->content);
            $post->setCreatedAt($obj->created_at);
            $post->setUpdateAt($obj->update_at);
            $post->setUser($obj->id_user);
            $listLastFivePosts[] = $post;
        }
        return $listLastFivePosts;
    }

    //id
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }

    //title
    public function getTitle(){
        return $this->title;
    }
    public function setTitle($title){
        $this->title = $title;
    }

    //content
    public function getContent(){
        return $this->content;
    }
    public function setContent($content){
        $this->content = $content;
    }
    
    //date creation
    public function getCreatedAt(){
        return $this->created_at;
    }
    public function setCreatedAt($created_at){
        $this->created_at = $created_at;
    }

    //date modification
    public function getUpdateAt(){
        return $this->update_at;
    }
    public function setUpdateAt($update_at){
        $this->update_at = $update_at;
    }

    //user
    public function getUser(){
        return $this->user;
    }
    public function setUser($user){
        $this->user = $user;
    }
}

?>

