<?php 

//includes
include_once("model/BddConnect.php");
include_once("controller/PostController.php");
include_once("controller/UserController.php");
include_once("controller/ReportController.php");
include_once("controller/CommentController.php");


session_start();

if(isset($_GET['action'])){
    $action = $_GET['action'];
}else{
    $action = '';
}


switch ($action){
    case 'accueil':
        $listLastFivePosts = getLastFivePosts();
        $vue = "view/accueil.php";
    break;
    case 'signIn':
        $vue = "view/login.php";
    break;
    case 'signUp':
        $vue = "view/newUser.php";
    break;
    case 'Dashbord':
        header('location:dashboard/index.php');
        exit;
    break;
    case 'addUser':
    //conditions si pas nom 
        // si pas prénom ...
        // ex if(isset($_POST['nom']) && empty($_POST['nom'])) $message = "Veuillez renseigner un Nom !";
        $message = addUser();
        $vue = "view/newUser.php";
    break;
    case 'login':
        $userLogin = verifLogin();
        if(!$userLogin){
            $message = "La combinaison identifiant et mot de passe est incorrect";
            $vue = "view/login.php";
        }else{
            $_SESSION["user"] = $userLogin->getId();
           
            if($userLogin->getRole() == 'admin'){
                header('location:dashboard/index.php');
                exit;
            }else{
                $listLastFivePosts = getLastFivePosts();
                $vue = "view/accueil.php";
            }
           
        }
    break;
    case 'logOut':
        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }       
    
        session_destroy();
        $listLastFivePosts = getLastFivePosts();
        $vue = "view/accueil.php";
    break;
    case 'allPosts':
        $listPosts = getAllPosts();
        $vue = "view/allPosts.php";
    break;
    case 'post':
        if(isset($_GET['id'])){
            $post = getOnePost($_GET['id']);
            $listComments = getCommentsByPost($_GET['id']);
            $vue = "view/post.php";
        }else{
            $vue = "view/error404.php";
        }
    break;
    case 'addComment':
        if(isset($_POST['comment']) && !empty($_POST['comment'])){
            $message = addComment();
        }else{
            $message = "Veuillez mettre du texte dans votre commentaire !";
        }
        $post = getOnePost($_POST['idPost']);
        $listComments = getCommentsByPost($_POST['idPost']);
        $vue = "view/post.php";
    break;
    case 'deleteComment':
        $message = deleteComment($_GET['idComment']);
        $post = getOnePost($_GET['idPost']);
        $listComments = getCommentsByPost($_GET['idPost']);
        $vue ="view/post.php";
    break;
    case 'addReport':
        $message = addReport($_GET['id']);
        $post = getOnePost($_GET['idPost']);
        $listComments = getCommentsByPost($_GET['idPost']);
        $vue = "view/post.php";
    break;
    default: 
        $listLastFivePosts = getLastFivePosts();
        $vue = 'view/accueil.php';
}




include_once("layout/layout.php");