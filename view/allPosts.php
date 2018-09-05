<div class="container">
    <div class="row">
    <?php

    foreach ($listPosts as $post){ ?>
        
    
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