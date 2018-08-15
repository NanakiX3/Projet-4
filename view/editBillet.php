<?php
    if(isset($message)) echo $message;
?>

<form action="index.php?action=addBilletBdd" method="POST">
    <div class="form-group">
      <label for="titre">Titre</label>
      <input class="form-control" id="titre" placeholder="Titre" type="text" name="titre" value="<?php echo $billet->getTitre(); ?>">
    </div>

    <div class="form-group">
      <label for="content">Contenu</label>
      <textarea class="tinyMCE" id="content" name="content"><?php echo $billet->getContent(); ?></textarea>
      <input name="image" type="file" id="upload" class="d-none" onchange="">
    </div>

    <input type="submit" value="Mettre à jour" class="btn btn-primary">
</form>