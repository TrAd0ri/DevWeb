<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/pages/library.css">
  <title>Game Collection</title>
</head>

<body>
  <?php include 'components/Header.php'; ?>

  <main>
    <h1>Ajouter un jeu à sa bibliothèque</h1>

    <form method="get" action="library">
      <input type="text" name="search" placeholder="Rechercher un jeu" value="<?= $search ?>">
      <input type="submit" value="Rechercher">
    </form>

    <div class="games">
      <?php foreach ($games as $game): ?>
        <div class="game">
          <div class="game-image">
            <img src="<?= $game['url_image'] ?>" alt="<?= $game['name'] ?>">
          </div>
          <div class="game-content">
            <h2>
              <?= $game['name'] ?>
            </h2>
            <div>
              <span>
                <?= implode(", ", $game['platforms']) ?>
              </span>
            </div>
            <form action="api/library/add.php" method="post">
              <input type="hidden" name="id" value="<?= $game['id'] ?>">
              <input type="submit" value="Ajouter à ma bibliothèque">
            </form>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </main>

</body>

</html>