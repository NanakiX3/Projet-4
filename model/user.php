<?php

class User{
    protected $id;
    protected $nom;
    protected $prenom;
    protected $identifiant;
    protected $motDePasse;
    protected $mail;
    protected $droit;

    public function addUser($connect){
        try{
            $req = $connect->prepare("INSERT INTO user (nom, prenom, identifiant, motDePasse, mail, droit) VALUES (:nom, :prenom, :identifiant, SHA1(:motDePasse), :mail, :droit)");
            $req->bindParam(":nom", $this->nom, PDO::PARAM_STR);
            $req->bindParam(":prenom", $this->prenom, PDO::PARAM_STR);
            $req->bindParam(":identifiant", $this->identifiant, PDO::PARAM_STR);
            $req->bindParam(":motDePasse", $this->motDePasse, PDO::PARAM_STR);
            $req->bindParam(":mail", $this->mail, PDO::PARAM_STR);
            $req->bindParam(":droit", $this->droit, PDO::PARAM_INT);
            $req->execute();
            $message = "Vous êtes bien inscrit sur les nouvelles de Jean FORTEROCHE!";
            return $message;
        }catch(PDOException $e){
            return "Votre inscription a échoué, en voici la raison : ".$e->getMessage();
        }
    }

    //id
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }

    //nom
    public function getNom(){
        return $this->nom;
    }
    public function setNom($nom){
        $this->nom = $nom;
    }

    //prenom
    public function getPrenom(){
        return $this->prenom;
    }
    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }

    //identifiant
    public function getIdentifiant(){
        return $this->identifiant;
    }
    public function setIdentifiant($identifiant){
        $this->identifiant = $identifiant;
    }

    //mot de passe
    public function getMotDePasse(){
        return $this->motDePasse;
    }
    public function setMotDePasse($motDePasse){
        $this->motDePasse = $motDePasse;
    }

    //mail
    public function getMail(){
        return $this->mail;
    }
    public function setMail($mail){
        $this->mail = $mail;
    }

    //droit
    public function getDroit(){
        return $this->droit;
    }
    public function setDroit($droit){
        $this->droit = $droit;
    }

}