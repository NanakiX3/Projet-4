<div class="container">
    <?php
        if(isset($_SESSION["user"])){
            echo "Bienvenue ".$_SESSION["user"]->getFirstName()." ".$_SESSION["user"]->getLastName();
        
        }
    ?>

    <div class="jumbotron jumbotron-fluid " id="header">
        <canvas class="snow"></canvas>
        <div class="header-content">
            <h1 class="display-4 font-weight-bold text-uppercase letter-spacing-2 text-white">billet simple pour l'alaska</h1>
            <p class="lead text-white">Jean FORTEROCHE</p>
        </div>
    </div>

    <div class="row">
    <?php

    foreach ($listLastFivePosts as $post){ ?>
        
    
            <div class="col-12 col-lg-4 align-self-stretch">
                <div class="card border-primary mb-3">
                    <div class="card-header bg-light"><h4><?php echo $post->getTitle();?></h4><span class="badge badge-info"><?php echo date("d-m-Y", strtotime($post->getCreatedAt())) ; ?></span></div>
                    <div class="card-body">
                        
                        <p><?php echo substr($post->getContent(), 0, 300) . ", ..." ?></p>
                        <a href="index.php?action=post&id=<?php echo $post->getId();?>" class="btn btn-outline-info btn-sm">Voir plus</a>
                    </div>
                </div>
            </div>
        

    <?php } ?>

    </div>
	
</div>

