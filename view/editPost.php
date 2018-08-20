<?php
    if(isset($message)) echo $message;
?>

<form action="index.php?action=addPostBdd" method="POST">
    <div class="form-group">
      <label for="title">Title</label>
      <input class="form-control" id="title" placeholder="Title" type="text" name="title" value="<?php echo $post->getTitle(); ?>">
    </div>

    <div class="form-group">
      <label for="content">Contenu</label>
      <textarea class="tinyMCE" id="content" name="content"><?php echo $post->getContent(); ?></textarea>
      <input name="image" type="file" id="upload" class="d-none" onchange="">
    </div>

    <input type="submit" value="Mettre à jour" class="btn btn-primary">
</form>