

        <?php
        session_start();
            if($_SESSION['role'] == 'lecteur'){
                header('location:../index.php');
                exit();
            }else{

                //ici toutes les actions 
                echo "Je suis admin et pas toi";
            }

            include_once('layout/layout.php');

        ?>
        
        


