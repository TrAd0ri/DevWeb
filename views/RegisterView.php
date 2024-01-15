<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/pages/register.css">
  <title>Game Collection</title>
</head>

<body>
  <main>

    <form action="api/auth/register.php" method="post">
      <h1>S'inscrire a Game Collection</h1>

      <?php if ($isError) { ?>
        <div class="error-msg">
          <img src="assets/images/alert-circle.svg" alt="error" width="24px">
          <span>Erreur lors de l'inscription, veuillez réessayer</span>
        </div>
      <?php } ?>

      <div class="form-item">
        <label for="name">Nom :</label>
        <input type="name" name="name" id="name" placeholder="Nom" required>
      </div>

      <div class="form-item">
        <label for="firstName">Prenom :</label>
        <input type="firstName" name="firstName" id="firstName" placeholder="Prenom" required>
      </div>

      <div class="form-item">
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" placeholder="Email" required>
      </div>

      <div class="form-item">
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" placeholder="Mot de passe" required minlength="8">
      </div>

      <div class="form-item">
        <label for="passwordConfirm">Confirmation du mot de passe :</label>
        <input type="password" name="passwordConfirm" id="passwordConfirm" placeholder="Mot de passe" required
          minlength="8">
      </div>

      <input type="submit" value="S'inscrire">
    </form>

    <a href="login">Se connecter</a>
  </main>

  <div class="copyright-container">
    <p>Game Collection - 2023 - Tous droits réservés</p>
  </div>
</body>

</html>