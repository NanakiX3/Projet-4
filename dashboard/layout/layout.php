<!doctype html>
<html lang="fr">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
        <link rel="stylesheet" href="../web/css/bootstraptheme.min.css">
        <link rel="stylesheet" href="./web/css/style.css">

    </head>
    <body>
		
		<div id="wrapper">
			<nav class="navbar navbar-expand-lg bg-light fixed-top">
				<div class="navbar-header  navbar-light" id="header">
					<a class="navbar-brand" href="#">Jean FORTEROCHE</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebar-left" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse navbar-dark " id="sidebar-left">
					
					<ul class="navbar-nav  navbar-sidenav bg-dark" id="sidebar-content">
						<li class="nav-item <?php if($action == "accueil") echo 'item-active'?>">
							<a class="nav-link" href="index.php?action=accueil">Accueil</a>
						</li>
						<li class="nav-item <?php if($action == "addPost") echo 'item-active'?>">
							<a class="nav-link" href="index.php?action=addPost">Publier</a>
						</li>
                        <li class="nav-item <?php if($action == "allPosts") echo 'item-active'?>">
							<a class="nav-link" href="index.php?action=allPosts">Tous les billets</a>
						</li>
                        <li class="nav-item <?php if($action == "allComments") echo 'item-active'?>">
							<a class="nav-link" href="index.php?action=allComments">Tous les commentaires</a>
						</li>
                        <li class="nav-item <?php if($action == "allCommentsReported") echo 'item-active'?>">
							<a class="nav-link" href="index.php?action=allCommentsReported">Commentaires signalés</a>
						</li>
                        <li class="nav-item">
							<a class="nav-link" href="../index.php">Aller sur le site</a>
						</li>
                        <li class="nav-item">
							<a class="nav-link" href="index.php?action=logOut">Se déconnecter</a>
						</li>
					   

					</ul>
					 
				</div>
				
			</nav>
		
		<div class="wrapper-content">
            <?php include($vue) ?>
		</div>



        

        <footer class="footer">
            <div class="container">
                <span class="text-muted">&copy; <?php echo date("Y"); ?> - Jean Forteroche</span>
            </div>
        </footer>

		</div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
		<script src="./web/js/tinymce/tinymce.min.js"></script>
		<script src="./web/js/script.js"></script>

    </body>
</html>
