<div class="container">
  <div class="row">
    <div class="col-12 text-justify d-flex">
      <div class="bg-post"></div>
      <div class="post-content">
        <h1><?php echo $post->getTitle();?></h1>
        <?php if(isset($_SESSION['user']) && verifLoginById($_SESSION["user"])->getRole() == "admin"){ ?>
          <a href="dashboard/index.php?action=editPost&id=<?php echo $post->getId(); ?>" class="badge badge-pill badge-warning">Editer</a>
          <a href="" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#modalDeletePost<?php echo $post->getId();?>">Supprimer</a>
          <div class="modal fade" id="modalDeletePost<?php echo $post->getId();?>" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Confirmer la suppression</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      Confirmez-vous la suppression du chapitre ?
                  </div>
                  <div class="modal-footer">
                      <a class="btn btn-sm btn-success" href="dashboard/index.php?action=deletePost&id=<?php echo $post->getId();?>">Confirmer</a>
                      <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Annuler</button>                
                  </div>
                  </div>
              </div>
          </div>
        <?php } ?>
          
        <h6 class="text-muted">Publié le : <?php echo date("d-m-Y", strtotime($post->getCreatedAt())) ; ?></h6>
        <?php 
          if(!empty($post->getUpdateAt())){
            echo "<h6 class='text-muted'>Modifié le : ".date("d-m-Y", strtotime($post->getUpdateAt()))."</h6>";
          }
        ?>
        <?php echo $post->getContent(); ?>
      </div>
    </div>
    
  </div>
</div>

<section id="comment" class="bg-dark p-4 mt-4 text-white">
  <div class="container">
    <div class="row">
      <!-- liste commentaires -->
      <h3 class="text-white">Commentaires des lecteurs</h3>
      <div class="col-12 pl-0">
        <hr class="border-white" style="border-width:3px;">
      </div>
      <?php if(isset($message)){  ?>
          <div class="alert alert-dismissible alert-secondary">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              
                  <?php echo $message; ?>
              
          </div>
      <?php } ?>
      <?php 
        if(empty($listComments)) echo "Aucun commentaire";
        foreach($listComments as $comment){?>
          <div class="col-12 py-3">
            <blockquote class="blockquote">
              <p class="mb-0"><?php echo htmlspecialchars($comment->getContent()); ?></p>
              <footer class="blockquote-footer">
              <?php echo $comment->getUser()->getRole() == "admin" ? $comment->getUser()->getFirstName()." ".$comment->getUser()->getLastName() : $comment->getUser()->getIdentifiant(); ?>
              <cite title="Source Title"><?php echo date("d-m-Y H:i", strtotime($comment->getDateComment())); ?></cite></footer>
            </blockquote>
            <?php if(isset($_SESSION["user"]) && verifLoginById($_SESSION["user"])->getRole() == "lecteur"){?>
              <a href="" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#modalReport<?php echo $comment->getId();?>">Signaler</a>
            <?php } ?>
            <?php if(isset($_SESSION["user"]) && verifLoginById($_SESSION["user"])->getRole() == "admin"){?>
              <a href="" data-toggle="modal" data-target="#modalDelete<?php echo $comment->getId();?>" class="badge badge-pill badge-danger">Supprimer</a>
            <?php } ?>
          </div>
          
          <div class="modal fade" id="modalReport<?php echo $comment->getId();?>" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Signalement du commentaire</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <?php if(verifReport($comment->getId())[0] > 0){ ?>
                    <div class="modal-body text-dark">
                      <p>Vous avez déjà signalé le commentaire.</p>
                    </div>
                    <div class="modal-footer">                        
                        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Fermer</button>                
                    </div>
                  <?php }else{ ?>
                  <form action="index.php?action=addReport&id=<?php echo $comment->getId();?>&idPost=<?php echo $post->getId() ?>" method="POST">
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="message" class="text-dark">Message</label>
                        <textarea class="form-control" id="message" name="message"></textarea>                       
                      </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-sm btn-success" value="Signaler">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Annuler</button>                
                    </div>
                  </form>
                  <?php } ?>
                  </div>
              </div>
          </div>
          <div class="modal fade" id="modalDelete<?php echo $comment->getId();?>" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Confirmer la suppression</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body text-dark">
                      Confirmez-vous la suppression du commentaire ?
                  </div>
                  <div class="modal-footer">
                      <a class="btn btn-sm btn-success" href="index.php?action=deleteComment&idComment=<?php echo $comment->getId();?>&idPost=<?php echo $post->getId() ?>">Confirmer</a>
                      <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Annuler</button>                
                  </div>
                  </div>
              </div>
          </div>


      <?php } ?>

      <!-- formulaire -->
      
      <div class="col-12 pl-0 text-white">
        <hr class="border-white" style="border-width:3px;">
          <?php
            if(isset($_SESSION["user"])){?>
              <!-- ici message -->
              <form action="index.php?action=addComment" method="POST">
                <div class="form-group">
                  <label for="comment">Laisser un commentaire</label>
                  <textarea class="form-control" id="comment" placeholder="Votre texte ici..." name="comment" required></textarea>
                </div>
                <input type="submit" value="Commenter" class="btn btn-outline-warning">
                <input type="hidden" value="<?php echo $post->getId() ?>" name="idPost">
              </form>
            <?php }else{?>
              <p class="h5 text-white">Pour laisser un commentaire, veuillez vous <a href="index.php?action=signUp" class="text-warning">inscrire</a> ou bien vous <a href="index.php?action=signIn" class="text-warning">connecter</a> !</p>
              
            <?php } ?>
        </div>
    </div>
  </div>
 </section>




