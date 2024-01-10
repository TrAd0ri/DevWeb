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
      <h1>Se connecter a Game Collection</h1>
      <?php
        if ($isError) {
          echo "<span style= color:red >Erreur lors de la connexion, veuillez réessayer</span>";
        }
      ?>
      <div class="form-item">
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" placeholder="Email" require>
      </div>

      <div class="form-item">
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" placeholder="Mot de passe" require minlength="6">
      </div>

      <input type="submit" value="Se connecter">
    </form>

    <a href="register">S'inscrire</a>
  </main>
</body>

</html>