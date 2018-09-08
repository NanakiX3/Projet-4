<?php

class User{
    private $connect;
    protected $id;
    protected $lastName;
    protected $firstName;
    protected $identifiant;
    protected $password;
    protected $mail;
    protected $role;

    public function __construct()
    {
        $db = BddConnect::getInstance();
        $this->connect = $db->getDbh();
    }


    public function addUser(){
        try{
            $req = $this->connect->prepare("INSERT INTO user (lastName, firstName, identifiant, password, mail, id_role) VALUES (:lastName, :firstName, :identifiant, SHA1(:password), :mail, 1)");
            $req->bindParam(":lastName", $this->lastName, PDO::PARAM_STR);
            $req->bindParam(":firstName", $this->firstName, PDO::PARAM_STR);
            $req->bindParam(":identifiant", $this->identifiant, PDO::PARAM_STR);
            $req->bindParam(":password", $this->password, PDO::PARAM_STR);
            $req->bindParam(":mail", $this->mail, PDO::PARAM_STR);
            $req->execute();
            $message = "Vous êtes bien inscrit sur les nouvelles de Jean FORTEROCHE!";
            return $message;
        }catch(PDOException $e){
            return "Votre inscription a échoué, en voici la raison : ".$e->getMessage();
        }
    }

    public function getUser($identifiant, $password){
        $req = $this->connect->prepare("SELECT id, lastName, firstName, identifiant, password, mail, id_role FROM user WHERE identifiant = :identifiant AND password = :password");
        $password = SHA1($password);
        
        $req->bindParam(":identifiant", $identifiant, PDO::PARAM_STR);
        $req->bindParam(":password", $password, PDO::PARAM_STR);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_OBJ);
        $obj = $req->fetch();
        if(empty($obj)){
            return null;
        }else{
            $user = new User();
            $user->setId($obj->id);
            $user->setLastName($obj->lastName);
            $user->setFirstName($obj->firstName);
            $user->setIdentifiant($obj->identifiant);
            $user->setPassword($obj->password);
            $user->setMail($obj->mail);
            $role = new Role();
            $userRole = $role->getRoleById($obj->id_role);
            $user->setRole($userRole->getRole());

            return $user;
        }
        
    }


    public function getUserById($id){
        $req = $this->connect->prepare("SELECT id, lastName, firstName, identifiant, mail, id_role FROM user WHERE id = " . $id);
        
        $req->execute();
        $req->setFetchMode(PDO::FETCH_OBJ);
        $obj = $req->fetch();
        if(empty($obj)){
            return null;
        }else{
            $user = new User();
            $user->setId($obj->id);
            $user->setLastName($obj->lastName);
            $user->setFirstName($obj->firstName);
            $user->setIdentifiant($obj->identifiant);
            $user->setMail($obj->mail);
            $role = new Role();
            $userRole = $role->getRoleById($obj->id_role);
            $user->setRole($userRole->getRole());

            return $user;
        }
        
    }

    //id
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }

    //lastName
    public function getLastName(){
        return $this->lastName;
    }
    public function setLastName($lastName){
        $this->lastName = $lastName;
    }

    //firstName
    public function getFirstName(){
        return $this->firstName;
    }
    public function setFirstName($firstName){
        $this->firstName = $firstName;
    }

    //identifiant
    public function getIdentifiant(){
        return $this->identifiant;
    }
    public function setIdentifiant($identifiant){
        $this->identifiant = $identifiant;
    }

    //mot de passe
    public function getPassword(){
        return $this->password;
    }
    public function setPassword($password){
        $this->password = $password;
    }

    //mail
    public function getMail(){
        return $this->mail;
    }
    public function setMail($mail){
        $this->mail = $mail;
    }

    //role
    public function getRole(){
        return $this->role;
    }
    public function setRole($role){
        $this->role = $role;
    }

}