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
    <div class="home-image">
      <img src="assets\images\Fond_Home.jpg" >
    </div>
    <h1 class="home_sentence">Salut <?= $_SESSION['user_name']?> ! Prêt à ajouter des jeux à ta collection ?</h1>
  </section>
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
            <p>
              <?= $game['type'] ?>
            </p>
            <p>
              <?= $game['hoursPlayed'] ?>
            </p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
      </main>
</body>

</html>