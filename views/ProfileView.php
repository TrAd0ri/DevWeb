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

    <div class="profile">
        <h1>Mon profil</h1>
        <p>Nom :
            <?= $_SESSION['user_name'] ?>
        </p>
        <p>Prénom :
            <?= $_SESSION['user_surname'] ?>
        </p>
        <p>Email :
            <?= $_SESSION['user_email'] ?>
        </p>

        <?php if (!$isEdit) { ?>
            <form action="profile" method="get">
                <input type="hidden" name="edit" value="true">
                <input type="submit" value="MODIFIER MON PROFIL">
            </form>
        <?php } else { ?>
            <form action="api/user/editProfile.php" method="post">

                <?php if ($isError) { ?>
                    <span style=color:red>Erreur lors de la modification, veuillez réessayer</span>
                <?php } ?>

                <div class="form-item">
                    <label for="name">Nom :</label>
                    <input type="name" name="name" id="name" placeholder="Nom" require>
                </div>

                <div class="form-item">
                    <label for="firstName">Prenom :</label>
                    <input type="firstName" name="firstName" id="firstName" placeholder="Prenom" require>
                </div>

                <div class="form-item">
                    <label for="email">Email :</label>
                    <input type="email" name="email" id="email" placeholder="Email" require>
                </div>

                <div class="form-item">
                    <label for="password">Mot de passe :</label>
                    <input type="password" name="password" id="password" placeholder="Mot de passe" require minlength="8">
                </div>

                <div class="form-item">
                    <label for="passwordConfirm">Confirmation du mot de passe :</label>
                    <input type="password" name="passwordConfirm" id="passwordConfirm" placeholder="Mot de passe" require
                        minlength="8">
                </div>

                <input type="submit" value="Modifier">
            </form>
        <?php } ?>
        <form action="api/user/deleteUser.php" method="post"><input type="submit" value="SUPPRIMER MON COMPTE"></form>
        <form action="api/auth/logout.php" method="post"><input type="submit" value="SE DÉCONNECTER"></form>
    </div>
</body>

</html>