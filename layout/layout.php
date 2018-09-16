<!doctype html>
<html lang="fr">
  <head>
    <title><?php echo $title ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link rel="stylesheet" href="./web/css/bootstraptheme.min.css">
    <link rel="stylesheet" href="./web/css/style.css">
  </head>
  <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="#">Jean FORTEROCHE</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarColor01">
                <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?action=accueil">Accueil<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=allPosts">Tous les billets</a>
                </li>
                <?php if(!isset($_SESSION["user"])){?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=signIn">Se connecter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=signUp">S'inscrire</a>
                </li>
                <?php } ?>
                <?php if(isset($_SESSION["user"]) && verifLoginById($_SESSION["user"])->getRole() == "admin"){?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=Dashbord">Tableau de bord</a>
                </li>
                <?php } ?>
                <?php if(isset($_SESSION["user"])){?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=logOut">Déconnexion</a>
                    </li>
                <?php } ?>

                </ul>
                
            </div>
        </nav>
    </header>

    

    <!-- <div class="container">
        <div class="row">
            <div class="col-12"> -->
               
            <?php include($vue) ?>
            
            <!-- </div>
        </div>
    </div> -->

    

    <footer class="footer">
      <div class="container">
        <span class="text-muted">&copy; <?php echo date("Y"); ?> - Jean Forteroche</span>
      </div>
    </footer>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    <script src="./web/js/verifFormSignUp.js"></script>
    <script src="./web/js/tinymce/tinymce.min.js"></script>
    <script src="./web/js/script.js"></script>       

  </body>
</html>