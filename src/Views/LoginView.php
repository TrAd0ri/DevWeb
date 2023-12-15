<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="src/assets/css/index.css">
  <title>Game Collection</title>
</head>

<body>
  <main>
    <h1>Se connecter a Game Collection</h1>

    <form action="" method="post">
      <div>
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" placeholder="Email" require>
      </div>
      <div>
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" placeholder="Mot de passe" require minlength="8">
      </div>
      <div>
        <input type="submit" value="Se connecter">
      </div>
    </form>

    <a href="register">S'inscrire</a>
  </main>
</body>

</html>