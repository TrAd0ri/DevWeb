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
    <h1 class="home_sentence">Salut <?= $_SESSION['user_surname']?> ! Prêt à ajouter des jeux à ta collection ?</h1>
  </section>
  <div class="games">
      <?php foreach ($games as $game): ?>
        <div class="game">
          <div class="game-image">
            <img src="<?= $game['url_image'] ?>" alt="<?= $game['name'] ?>">
          </div>
          <div class="game-content">
            <h2>
              <?= $game['name']," ", $game['hoursPlayed'] ?> h
            </h2>
            <p>
              <?php foreach ($game['platforms'] as $index => $platform): ?>
                <?= $platform ?>
                <?php if ($index < count($game['platforms']) - 1): ?>
                  ,
                <?php endif; ?>
              <?php endforeach; ?>
            </p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
      </main>
</body>

</html>