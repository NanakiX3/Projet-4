<h1>Hello</h1>

<div class="row">
<?php

foreach ($listLastFiveBillets as $billet){ ?>
    
   
        <div class="col-12 col-lg-4 align-self-stretch">
            <div class="card border-primary mb-3">
                <div class="card-header bg-light"><h4><?php echo $billet->getTitre();?></h4><span class="badge badge-info"><?php echo $billet->getDateCreation(); ?></span></div>
                <div class="card-body">
                    
                    <p><?php echo substr($billet->getContent(), 0, 300) . ", ..." ?></p>
                    <a href="index.php?action=billet&id=<?php echo $billet->getId();?>" class="btn btn-outline-info btn-sm">Voir plus</a>
                    <a href="index.php?action=editBillet&id=<?php echo $billet->getId();?>" class="btn btn-outline-warning btn-sm">Edit</a>
                </div>
            </div>
        </div>
    

<?php } ?>

</div>
	
	

