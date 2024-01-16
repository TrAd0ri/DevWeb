<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/pages/ranking.css">
    <title>Game Collection</title>
</head>
<body>
    <?php include 'components/Header.php' ?>

    <div class="classement">
        <h1>Classement des temps passés</h1>    

        <table>
        <thead>
            <tr>
                <th>Joueur</th>
                <th>Temps Passés</th>
                <th>Jeu</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($data as $row): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['name_gamer']); ?></td>
                <td><?php echo htmlspecialchars($row['MAX(number_hours_game)']); ?></td>
                <td><?php echo htmlspecialchars($row['name_game']); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    </div>

    <?php include 'components/Footer.php'; ?>
</body>
</html>