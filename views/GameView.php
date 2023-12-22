<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/pages/game.css">
  <title>Game Collection</title>
</head>

<body>
  <?php include 'components/Header.php'; ?>

  <main>
    <div>
      <h1>
        <?= $game['name'] ?>
      </h1>
      <p>
        <?= $game['description'] ?>
      </p>
      <p>Date de sortie :
        <?= $game['released_date'] ?>
      </p>
      <p>Plateforme :
        <?= $game['type'] ?>
      </p>
      <p>Editeur :
        <?= $game['editor'] ?>
      </p>
      <p>Temps passé :
        <?= $game['hoursPlayed'] ?> h
      </p>

      <h2>Modifer le temps passé sur le jeu</h2>

      <form action="api/game/change-hours.php" method="post">
        <label for="hours">Nombre d'heures</label>
        <input type="number" name="hours" id="hours" min="0" max="1000" required>
        <input type="hidden" name="id" value="<?= $game['id'] ?>">
        <button type="submit">Modifier</button>
      </form>

      <form action="api/game/delete.php" method="post">
        <input type="hidden" name="id" value="<?= $game['id'] ?>">
        <button type="submit">Supprimer le jeu de ma bibliothèque</button>
      </form>
    </div>
    <div class="image-container">
      <img src="<?= $game['url_image'] ?>" alt="<?= $game['name'] ?>">
    </div>
  </main>
</body>

</html>