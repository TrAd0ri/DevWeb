<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/pages/profile.css">
    <title>Game Collection</title>
</head>

<body>
    <?php include 'components/Header.php' ?>

    <main>
        <h1>Mon profil</h1>

        <?php if ($isError) { ?>
            <div class="error-msg">
                <img src="assets/images/alert-circle.svg" alt="error" width="24px">
                <span>Erreur lors de la modification du profil, veuillez réessayer</span>
            </div>
        <?php } ?>

        <?php if (!$isEdit) { ?>
            <p>Nom :
                <?= $_SESSION['user_name'] ?>
            </p>
            <p>Prénom :
                <?= $_SESSION['user_surname'] ?>
            </p>
            <p>Email :
                <?= $_SESSION['user_email'] ?>
            </p>

            <form action="profile" method="get">
                <input type="hidden" name="edit" value="true">
                <input type="submit" value="Modifier le profil">
            </form>

        <?php } else { ?>
            <form action="api/user/editProfile.php" method="post">

                <div class="form-item">
                    <label for="name">Nom :</label>
                    <input type="name" name="name" placeholder="Nom" required value="<?= $_SESSION['user_name'] ?>">
                </div>

                <div class="form-item">
                    <label for="firstName">Prenom :</label>
                    <input type="firstName" name="firstName" placeholder="Prenom" required
                        value="<?= $_SESSION['user_surname'] ?>">
                </div>

                <div class="form-item">
                    <label for="email">Email :</label>
                    <input type="email" name="email" placeholder="Email" required value="<?= $_SESSION['user_email'] ?>">
                </div>

                <div class="form-item">
                    <label for="password">Mot de passe :</label>
                    <input type="password" name="password" placeholder="Mot de passe" require minlength="8">
                </div>

                <div class="form-item">
                    <label for="passwordConfirm">Confirmation du mot de passe :</label>
                    <input type="password" name="passwordConfirm" placeholder="Mot de passe" require minlength="8">
                </div>

                <div class="btn-group">
                    <button class="cancel">
                        <a href="profile">Annuler</a>
                    </button>
                    <input type="submit" value="Modifier">
                </div>
            </form>

        <?php } ?>

        <form action="api/user/deleteUser.php" method="post">
            <input type="submit" value="Supprimer mon compte">
        </form>

        <form action="api/auth/logout.php" method="post">
            <input type="submit" value="Se déconnecter">
        </form>
    </main>

    <?php include 'components/Footer.php'; ?>
</body>

</html>