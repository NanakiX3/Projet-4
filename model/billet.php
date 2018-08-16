<?php

class Billet{
    protected $id;              
    protected $titre;          
    protected $content;         
    protected $dateCreation;     
    protected $dateModification;
    protected $user;

    public function allBillets($connect){
        $req = $connect->query("SELECT id, titre, content, dateCreation, dateModification, id_user FROM billet ORDER BY dateCreation ");
        $req->setFetchMode(PDO::FETCH_OBJ);
        $listBillets = array();
        while ($obj = $req->fetch()){
            $billet = new Billet();
            $billet->setId($obj->id);
            $billet->setTitre($obj->titre);
            $billet->setContent($obj->content);
            $billet->setDateCreation($obj->dateCreation);
            $billet->setDateModification($obj->dateModification);
            $billet->setUser($obj->id_user);
            $listBillets[] = $billet;
        }
        return $listBillets;
    }

    public function getBillet($connect, $id){
        $req = $connect->query("SELECT id, titre, content, dateCreation, dateModification, id_user FROM billet WHERE id = ".$id." ORDER BY dateCreation ");
        $req->setFetchMode(PDO::FETCH_OBJ);

        $billet = new Billet();
        while ($obj = $req->fetch()){
            $billet->setId($obj->id);
            $billet->setTitre($obj->titre);
            $billet->setContent($obj->content);
            $billet->setDateCreation($obj->dateCreation);
            $billet->setDateModification($obj->dateModification);
            $billet->setUser($obj->id_user);
            
        }
        return $billet;
    }

    public function insertBillet($connect){
        try{
            $req = $connect->prepare("INSERT INTO billet (titre, content, dateCreation, id_user) VALUES (:titre, :content, NOW(), 1)");
            $req->bindParam(":titre", $this->titre, PDO::PARAM_STR);
            $req->bindParam(":content", $this->content, PDO::PARAM_STR);
            $req->execute();
            $message = "Votre billet a bien été enregistré !";
            return $message;
        }catch(PDOException $e){
            return "Votre enregistrement a échoué, en voici la raison : ".$e->getMessage();
        }
    }

    public function getLastFiveBillets($connect){
        $req = $connect->query("SELECT id, titre, content, dateCreation, dateModification, id_user FROM billet ORDER BY dateCreation LIMIT 5");
        $req->setFetchMode(PDO::FETCH_OBJ);
        $listLastFiveBillets = array();
        while ($obj = $req->fetch()){
            $billet = new Billet();
            $billet->setId($obj->id);
            $billet->setTitre($obj->titre);
            $billet->setContent($obj->content);
            $billet->setDateCreation($obj->dateCreation);
            $billet->setDateModification($obj->dateModification);
            $billet->setUser($obj->id_user);
            $listLastFiveBillets[] = $billet;
        }
        return $listLastFiveBillets;
    }

    //id
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }

    //titre
    public function getTitre(){
        return $this->titre;
    }
    public function setTitre($titre){
        $this->titre = $titre;
    }

    //content
    public function getContent(){
        return $this->content;
    }
    public function setContent($content){
        $this->content = $content;
    }
    
    //date creation
    public function getDateCreation(){
        return $this->dateCreation;
    }
    public function setDateCreation($dateCreation){
        $this->dateCreation = $dateCreation;
    }

    //date modification
    public function getDateModification(){
        return $this->dateModification;
    }
    public function setDateModification($dateModification){
        $this->dateModification = $dateModification;
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

