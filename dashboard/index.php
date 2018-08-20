<?php 
session_start();

if($_SESSION['role'] == 'lecteur'){
    header('location:../index.php');
    exit();
}else{
    echo "Je suis admin et pas toi";
}

?>
<h1>Dashboard</h1>