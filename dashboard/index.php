
<?php
session_start();
   
        //includes
include("../model/BddConnect.php");
include_once("controller/PostController.php");
include_once("controller/UserController.php");
include_once("controller/CommentController.php");

$userLogin = verifLogin($_SESSION['user']);

if($userLogin->getRole() == 'lecteur'){
    header('location:../index.php');
    exit();
}else{

    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }else{
        $action = '';
    }


    switch ($action){
        case 'accueil':
           
            $vue = "view/accueil.php";
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
        case 'addPost':
            $vue = "view/addPost.php";
        break;
        case 'addPostBdd':
            if(isset($_POST['title']) && !empty($_POST['title'])){
                $message = addPost();
            }else{
                $message = "Veuillez renseigner un titre !";
            }
            
            $vue = "view/addPost.php";
        break;
        case 'updatePostBdd':
            $id = $_GET['id'];
            if(isset($_POST['title']) && !empty($_POST['title'])){
                $message = updatePost($id);
            }else{
                $message = "Veuillez renseigner un titre !";
            }
            $post = getOnePost($id);
            $vue = "view/editPost.php";
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
        case 'editPost':
            $post = getOnePost($_GET['id']);
            $vue = "view/editPost.php";
        break;
       
        case 'deleteComment':
            $message = deleteComment($_GET['idComment']);
            $post = getOnePost($_GET['idPost']);
            $listComments = getCommentsByPost($_GET['idPost']);
            $vue ="view/post.php";
        break;
        default:
       
            $vue = 'view/accueil.php';
    }

}


include_once("layout/layout.php");
        


