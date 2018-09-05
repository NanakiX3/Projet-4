<div class="container">
  <div class="row">
    <div class="col-1 bg-post"></div>
    <div class="col-11 text-justify">
      <h1><?php echo $post->getTitle();?></h1>
      <h6 class="text-muted">Publié le : <?php echo date("d-m-Y", strtotime($post->getCreatedAt())) ; ?></h6>
      <?php 
        if(!empty($post->getUpdateAt())){
          echo "<h6 class='text-muted'>Modifié le : ".date("d-m-Y", strtotime($post->getUpdateAt()))."</h6>";
        }
      ?>
      <?php echo $post->getContent(); ?>
    </div>

    <div class="col-12">
        
    </div>
      
  
  </div>
</div>

<section id="comment" class="bg-dark p-4 mt-4 text-white">
  <div class="container">
    <div class="row">
      <!-- liste commentaires -->
      <h3 class="text-white">Commentaires des lecteurs</h3>
      <div class="col-12">
        <hr class="border-white" style="border-width:3px;">
      </div>
      <?php
          if(isset($message)) echo $message;
      ?>
      <?php 
        foreach($listComments as $comment){?>
          <div class="col-12 py-3">
            <blockquote class="blockquote">
              <p class="mb-0"><?php echo $comment->getContent(); ?></p>
              <footer class="blockquote-footer">
              <?php echo $comment->getUser()->getRole() == "admin" ? $comment->getUser()->getFirstName()." ".$comment->getUser()->getLastName() : $comment->getUser()->getIdentifiant(); ?>
              <cite title="Source Title"><?php echo date("d-m-Y H:i", strtotime($comment->getDateComment())); ?></cite></footer>
            </blockquote>
            <?php if(isset($_SESSION["user"]) && $_SESSION["user"]->getRole() == "lecteur"){?>
              <a href="" class="badge badge-pill badge-danger">Signaler</a>
            <?php } ?>
            <?php if(isset($_SESSION["user"]) && $_SESSION["user"]->getRole() == "admin"){?>
              <a href="index.php?action=deleteComment&idComment=<?php echo $comment->getId(); ?>&idPost=<?php echo $post->getId() ?>" class="badge badge-pill badge-danger">Supprimer</a>
            <?php } ?>
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




