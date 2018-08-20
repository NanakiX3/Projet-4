<?php
    if(isset($message)) echo $message;
?>

<form action="index.php?action=addUser" method="POST">
    <div class="form-group">
      <label for="lastName">Nom</label>
      <input class="form-control" id="lastName" placeholder="Nom" type="text" name="lastName">
    </div>

    <div class="form-group">
      <label for="firstName">Prénom</label>
      <input class="form-control" id="firstName" placeholder="Prénom" type="text" name="firstName">
    </div>

    <div class="form-group">
      <label for="identifiant">Identifiant</label>
      <input class="form-control" id="identifiant" placeholder="Identifiant" type="text" name="identifiant">
    </div>

    <div class="form-group">
      <label for="password">Mot de passe</label>
      <input class="form-control" id="password" placeholder="Mot de passe" type="password" name="password">
    </div>

    <div class="form-group">
      <label for="mail">Mail</label>
      <input class="form-control" id="mail" aria-describedby="emailHelp" placeholder="Enter email" type="text" name="mail">
      <input readonly="" class="form-control-plaintext" id="staticEmail" value="email@example.com" type="text">
    </div>

    <input type="submit" value="S'inscrire" class="btn btn-primary">
</form>