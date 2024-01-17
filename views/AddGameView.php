<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/pages/addGame.css">
  <title>Game Collection</title>
</head>

<body>
  <?php include 'components/Header.php' ?>

  <main>
    <h1>Ajouter un jeu à sa bibliothèque</h1>
    <p>Le jeu que vous souhaiter ajouter n'existe pas ! Vous pouvez le créer, celui-ci sera automatiquement ajouter a
      votre bibliothèque !</p>

    <?php if ($isError) { ?>
      <div class="error-msg">
        <img src="assets/images/alert-circle.svg" alt="error" width="24px">
        <span>Erreur lors de l'ajout du jeu, veuillez réessayer</span>
      </div>
    <?php } ?>

    <form action="api/game/add.php" method="post">
      <div class="form-item">
        <label for="name">Nom du jeu :</label>
        <input type="text" name="name" placeholder="Nom" required>
      </div>

      <div class="form-item">
        <label for="editor">Editeur du jeu :</label>
        <input type="text" name="editor" placeholder="Editeur" required>
      </div>

      <div class="form-item">
        <label for="released_date">Date de sortie du jeu :</label>
        <input type="date" name="released_date" required>
      </div>

      <div class="form-item">
        <label for="platforms">Plateformes :</label>
        <fieldset name="platforms" required>
          <div>
            <input type="checkbox" name="platforms[]" value="PlayStation">
            <label for="PlayStation">Playstation</label>
          </div>

          <div>
            <input type="checkbox" name="platforms[]" value="Xbox">
            <label for="Xbox">Xbox</label>
          </div>

          <div>
            <input type="checkbox" name="platforms[]" value="Nintendo">
            <label for="Nintendo">Nintendo</label>
          </div>

          <div>
            <input type="checkbox" name="platforms[]" value="PC">
            <label for="PC">PC</label>
          </div>
        </fieldset>
      </div>

      <div class="form-item">
        <label for="description">Description du jeu :</label>
        <textarea name="description" placeholder="Description" required rows="5"></textarea>
      </div>

      <div class="form-item">
        <label for="url_image">URL de la cover :</label>
        <input type="text" name="url_image" placeholder="URL de l'image" required>
      </div>

      <div class="form-item">
        <label for="url_image">URL du site :</label>
        <input type="text" name="url_site" placeholder="URL du site" required>
      </div>

      <input type="submit" value="Ajouter le jeu">
    </form>

  </main>

  <?php include 'components/Footer.php'; ?>
</body>

</html>