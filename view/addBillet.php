<?php
    if(isset($message)) echo $message;
?>

<form action="index.php?action=addBilletBdd" method="POST">
    <div class="form-group">
      <label for="titre">Titre</label>
      <input class="form-control" id="titre" placeholder="Titre" type="text" name="titre">
    </div>

    <div class="form-group">
      <label for="content">Contenu</label>
      <textarea class="tinyMCE" id="content" name="content"></textarea>
      <input name="image" type="file" id="upload" class="d-none" onchange="">
    </div>

    <input type="submit" value="Envoyer" class="btn btn-primary">
</form>