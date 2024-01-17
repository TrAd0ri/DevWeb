<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/pages/home.css">
  <title>Game Collection</title>
</head>

<body>
  <?php include 'components/Header.php'; ?>

  <main>
    <section class="presentation">
      <div class="home-image-container">
        <img src="assets\images\Fond_Home.jpg">
      </div>

      <h1>Salut
        <?= $_SESSION['user_surname'] ?> ! Prêt à ajouter des jeux à ta collection ?
      </h1>
    </section>

    <h2 class="games-title">Mes jeux</h2>

    <section class="games">
      <?php foreach ($games as $game): ?>
        <a class="game" href="game?id=<?= $game['id'] ?>">
          <div class="game-image">
            <img src="<?= $game['url_image'] ?>" alt="<?= $game['name'] ?>">
          </div>
          <div class="game-content">
            <div class="game-content-header">
              <h2>
                <?= $game['name'] ?>
              </h2>
              <p>
                <?= $game['hoursPlayed'] . 'h' ?>
              </p>
            </div>
            <p>
              <?= implode(", ", $game['platforms']) ?>
            </p>
          </div>
        </a>
      <?php endforeach; ?>
    </section>
  </main>

  <?php include 'components/Footer.php'; ?>
</body>

</html>