<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/pages/login.css">
  <title>Game Collection</title>
</head>

<body>
  <main>

    <form action="api/auth/login.php" method="post">
      <h1>Inscription</h1>

      <div class="form-item">
        <label for="name">Nom :</label>
        <input type="name" name="name" id="name" placeholder="Nom" require>
      </div>

      <div class="form-item">
        <label for="firstname">Prenom :</label>
        <input type="firstname" name="firstname" id="firstname" placeholder="Prenom" require>
      </div>

      <div class="form-item">
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" placeholder="Email" require>
      </div>

      <div class="form-item">
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" placeholder="Mot de passe" require minlength="8">
      </div>

      <div class="form-item">
        <label for="passwordverif">Confirmation du mot de passe :</label>
        <input type="passwordverif" name="passwordverif" id="passwordverif" placeholder="Mot de passe" require minlength="8">
      </div>

      <input type="submit" value="S'inscrire">
    </form>

    <a href="register">Se connecter</a>
  </main>
</body>

</html>