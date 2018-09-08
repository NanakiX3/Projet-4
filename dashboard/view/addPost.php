
<div class="container">
  <div class="row">
    <div class="col-12">

      <div class="alert alert-dismissible alert-secondary">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <?php
            if(isset($message)) echo $message;
        ?>
      </div>

      <form action="index.php?action=addPostBdd" method="POST">
          <div class="form-group">
            <label for="title">Titre</label>
            <input class="form-control" id="title" placeholder="Titre" type="text" name="title">
          </div>

          <div class="form-group">
            <label for="content">Contenu</label>
            <textarea class="tinyMCE" id="content" name="content"></textarea>
            <input name="image" type="file" id="upload" class="d-none" onchange="">
          </div>

          <input type="submit" value="Envoyer" class="btn btn-primary">
      </form>

    </div>
  </div>
</div>