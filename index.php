<?php 

//includes
include_once("./lib/bddConnect.php");
$connect = bddConnect::getMySqlConnection();
include_once("controller/controller.php");
include_once("controller/UserController.php");

session_start();

if(isset($_GET['action'])){
    $action = $_GET['action'];
}else{
    $action = '';
}


switch ($action){
    case 'accueil':
        $listLastFivePosts = getLastFivePosts($connect);
        $vue = "view/accueil.php";
    break;
    case 'signIn':
        $vue = "view/login.php";
    break;
    case 'signUp':
        $vue = "view/newUser.php";
    break;
    case 'addUser':
    //conditions si pas nom 
        // si pas prénom ...
        // ex if(isset($_POST['nom']) && empty($_POST['nom'])) $message = "Veuillez renseigner un Nom !";
        $message = addUser($connect);
        $vue = "view/newUser.php";
    break;
    case 'login':
        $userLogin = verifLogin($connect);
        if(!$userLogin){
            $message = "La combinaison identifiant et mot de passe est incorrect";
            $vue = "view/login.php";
        }else{
            $_SESSION["id"] = $userLogin->getId();
            $_SESSION["lastName"] = $userLogin->getLastName();
            $_SESSION["firstName"] = $userLogin->getFirstName();
            $_SESSION["identifiant"] = $userLogin->getIdentifiant();
            $_SESSION["password"] = $userLogin->getPassword();
            $_SESSION["mail"] = $userLogin->getMail();
            $_SESSION["role"] = $userLogin->getRole();
            if($_SESSION['role'] == 'admin'){
                header('location:dashboard/index.php');
                exit;
            }else{
                $listLastFivePosts = getLastFivePosts($connect);
                $vue = "view/accueil.php";
            }
           
        }
    break;
    case 'logOut':
        session_destroy();
        $listLastFivePosts = getLastFivePosts($connect);
        $vue = "view/accueil.php";
    break;
    case 'addPost':
        $vue = "view/addPost.php";
    break;
    case 'addPostBdd':
        if(isset($_POST['title']) && !empty($_POST['title'])){
            $message = addPost($connect);
        }else{
            $message = "Veuillez renseigner un titre !";
        }
        
        $vue = "view/addPost.php";
    break;
    case 'allPosts':
        $listPosts = getAllPosts($connect);
        $vue = "view/allPosts.php";
    break;
    case 'post':
        if(isset($_GET['id'])){
            $post = getOnePost($connect, $_GET['id']);
            $vue = "view/post.php";
        }else{
            $vue = "view/error404.php";
        }
    break;
    case 'editPost':
        $post = getOnePost($connect, $_GET['id']);
        $vue = "view/editPost.php";
    break;

    default: 
    $listLastFivePosts = getLastFivePosts($connect);
        $vue = 'view/accueil.php';
}




include_once("layout/layout.php");