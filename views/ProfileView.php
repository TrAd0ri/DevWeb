<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/pages/profile.css">
    <title>Game Collection</title>
</head>

<body>
    <?php include 'components/Header.php';
    include 'models/UserModel.php' ?>

    <div class="profile">
        <h1>Mon profil</h1>
        <p>Nom : <?= $_SESSION['user_name'] ?></p>
        <p>Prénom : <?= $_SESSION['user_surname'] ?></p>
        <p>Email : <?= $_SESSION['user_email'] ?></p>

        <?php if (!$isEdit) { ?>
            <button onclick="edit()">MODIFIER MON PROFIL</button>
        <?php } else { ?>
            <form action="api/editProfile.php" method="post">
                <?php
                if ($isError) {
                    echo "<span style= color:red >Erreur lors de la modification, veuillez réessayer</span>";
                }
                ?>

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
                    <input type="password" name="passwordConfirm" id="passwordConfirm" placeholder="Mot de passe" require minlength="8">
                </div>

                <input type="submit" value="Modifier">
            </form>
        <?php } ?>
        <button onclick="deleteUser()">SUPPRIMER MON COMPTE</button>
        <button onclick="disconnectFunction()">SE DÉCONNECTER</button>
    </div>


    <script>
        function disconnectFunction() {
            window.location.href = "api/auth/logout.php";
        }

        function deleteUser() {
            window.location.href = "api/deleteUser.php";
        }

        function edit() {
            window.location.href = "./profile?edit=true";
        }
    </script>
</body>

</html>