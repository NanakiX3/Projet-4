<?php



//models
include_once("./model/billet.php");



function addBillet($connect){
    $billet = new Billet();
    $billet->setTitre($_POST["titre"]);
    $billet->setContent($_POST["content"]);

    $message = $billet->insertBillet($connect);
    return $message;
}

function getAllBillets($connect){
    $billet = new Billet();
    $listBillets = $billet->allBillets($connect);

    return $listBillets;
}

function getOneBillet($connect, $id){
    $billet = new Billet();
    $oneBillet = $billet->getBillet($connect, $id);

    return $oneBillet;
}

function getLastFiveBillets($connect){
    $billet = new Billet();
    $listLastFiveBillets = $billet->getLastFiveBillets($connect);
    
    return $listLastFiveBillets;
}