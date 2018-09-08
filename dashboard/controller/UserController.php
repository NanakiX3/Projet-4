<?php

include_once("../model/Role.php");
include_once("../model/User.php");

function verifLogin($id){
    $user = new User();
    $userLogin = $user->getUserById($id);
    return $userLogin;
}

