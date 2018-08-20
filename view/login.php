<?php
    if(isset($message)) echo $message;
?>


<form action="index.php?action=login" method="POST">

    <div class="form-group">
      <label for="identifiant">Identifiant</label>
      <input class="form-control" id="identifiant" placeholder="Identifiant" type="text" name="identifiant">
    </div>

    <div class="form-group">
      <label for="password">Mot de passe</label>
      <input class="form-control" id="password" placeholder="Mot de passe" type="password" name="password">
    </div>

    <input type="submit" value="Se connecter" class="btn btn-primary">
</form>