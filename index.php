<?php 

//includes
include_once("./lib/bddConnect.php");
$connect = bddConnect::getMySqlConnection();
include_once("controller/controller.php");



if(isset($_GET['action'])){
    $action = $_GET['action'];
}else{
    $action = '';
}

switch ($action){
    case 'accueil':
        $vue = "view/accueil.php";
    break;
    case 'addBillet':
        $vue = "view/addBillet.php";
    break;
    case 'addBilletBdd':
        if(isset($_POST['titre']) && !empty($_POST['titre'])){
            $message = addBillet($connect);
        }else{
            $message = "Veuillez renseigner un titre !";
        }
        
        $vue = "view/addBillet.php";
    break;
    case 'allBillets':
        $listBillets = getAllBillets($connect);
        $vue = "view/allBillets.php";
    break;
    case 'billet':
        if(isset($_GET['id'])){
            $billet = getOneBillet($connect, $_GET['id']);
            $vue = "view/billet.php";
        }else{
            $vue = "view/error404.php";
        }
    break;
    case 'editBillet':
        $billet = getOneBillet($connect, $_GET['id']);
        $vue = "view/editBillet.php";
    break;

    default: 
        $vue = 'view/accueil.php';
}




include_once("layout/layout.php");