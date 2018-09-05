<?php 

//includes
include_once("./lib/bddConnect.php");
$connect = bddConnect::getMySqlConnection();
include_once("controller/PostController.php");
include_once("controller/UserController.php");
include_once("controller/CommentController.php");

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
    case 'Dashbord':
        header('location:dashboard/index.php');
        exit;
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
            $_SESSION["user"] = $userLogin;
           
            if($_SESSION['user']->getRole() == 'admin'){
                header('location:dashboard/index.php');
                exit;
            }else{
                $listLastFivePosts = getLastFivePosts($connect);
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
            $listComments = getCommentsByPost($connect, $_GET['id']);
            $vue = "view/post.php";
        }else{
            $vue = "view/error404.php";
        }
    break;
    case 'editPost':
        $post = getOnePost($connect, $_GET['id']);
        $vue = "view/editPost.php";
    break;
    case 'addComment':
        if(isset($_POST['comment']) && !empty($_POST['comment'])){
            $message = addComment($connect);
        }else{
            $message = "Veuillez mettre du texte dans votre commentaire !";
        }
        $post = getOnePost($connect, $_POST['idPost']);
        $listComments = getCommentsByPost($connect, $_POST['idPost']);
        $vue = "view/post.php";
    break;
    case 'deleteComment':
        $message = deleteComment($connect, $_GET['idComment']);
        $post = getOnePost($connect, $_GET['idPost']);
        $listComments = getCommentsByPost($connect, $_GET['idPost']);
        $vue ="view/post.php";
    break;
    default: 
    $listLastFivePosts = getLastFivePosts($connect);
        $vue = 'view/accueil.php';
}




include_once("layout/layout.php");