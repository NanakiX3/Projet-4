<?php

include_once("./model/Role.php");
include_once("./model/User.php");

function verifLogin($connect){
    $user = new User();
    $userLogin = $user->getUser($connect, $_POST["identifiant"], $_POST["password"]);
    return $userLogin;
}

function addUser($connect){
    $user = new User();
    $user->setId($_POST['id']);
    $user->setLastName($_POST['lastName']);
    $user->setFirstName($_POST['firstName']);
    $user->setIdentifiant($_POST['identifiant']);
    $user->setPassword($_POST['password']);
    $user->setMail($_POST['mail']);

    $message = $user->addUser($connect);
    return $message;
}