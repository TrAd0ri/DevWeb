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

  <h2>Ajouter du temps passé sur le jeu</h2>
</body>

</html>