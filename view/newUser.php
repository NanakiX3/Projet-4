

<form action="index.php?action=addUser" method="POST">
    <div class="form-group">
      <label for="nom">Nom</label>
      <input class="form-control" id="nom" placeholder="Nom" type="text" name="nom">
    </div>

    <div class="form-group">
      <label for="prenom">Prénom</label>
      <input class="form-control" id="prenom" placeholder="Prenom" type="text" name="prenom">
    </div>

    <div class="form-group">
      <label for="identifiant">Identifiant</label>
      <input class="form-control" id="identifiant" placeholder="Identifiant" type="text" name="identifiant">
    </div>

    <div class="form-group">
      <label for="motdepasse">Mot de passe</label>
      <input class="form-control" id="motdepasse" placeholder="Mot de passe" type="password" name="motdepasse">
    </div>

    <div class="form-group">
      <label for="mail">Mail</label>
      <input class="form-control" id="mail" aria-describedby="emailHelp" placeholder="Enter email" type="text">
      <input readonly="" class="form-control-plaintext" id="staticEmail" value="email@example.com" type="text">
    </div>

    <input type="submit" value="S'inscrire" class="btn btn-primary">
</form>