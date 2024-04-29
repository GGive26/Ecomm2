<!DOCTYPE html>
<html lang="en">
<?php
//Page pour l'Affichage du profil
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GestionProduit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body class="acceuilClient">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <img src="../styles/images/bienvenu.webp" class="img-circle" width="80" height="70" />
        <a class="navbar-brand" href="#">CrazySimpson</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="#">Profil</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="../views/Acceuil.php">Acceuil</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="../views/gestionProduit.php">gestionProduit</a>
                </li>

            </ul>
        </div>
    </nav>
    <?php

    if (isset($_SESSION['auth'])) {

    ?>

        <form action="./editProfil.php" method="post">
            <fieldset>
                <center>
                    <legend> <?php echo "<h1>  SALUT  ... <mark>" . $_SESSION['auth']['nom'] . " - " . $_SESSION['auth']['prenom'] . "</mark>...</h1>"; ?></legend>
                </center>
                <div class="container">
                    <div>
                        <label for="lname">Nom : </label>
                        <input id="lname" type="text" name="nomUpdate" value="<?php echo $_SESSION['auth']['nom'] ?>">
                    </div>
                    <div>
                        <label for="fname">Prenom : </label>
                        <input id="fname" type="text" name="prenom" value="<?php echo $_SESSION['auth']['prenom'] ?>">

                    </div>

                    <div>
                        <label for="email">Courriel</label>
                        <input id="email" type="text" name="email" value="<?php echo $_SESSION['auth']['email'] ?>">

                    </div>
                    <div>
                        <label for="fname">Password : </label>
                        <input id="fname" type="text" name="password" value="<?php echo $_SESSION['auth']['password'] ?>">

                    </div>
                </div>
            </fieldset>
            <center> <input type="submit" value="Modifier"></center>
        <?php
    } else if (isset($_SESSION['login'])) {
        ?>

            <form action="./editProfil.php" method="post">
                <fieldset>
                    <center>
                        <legend> <?php echo "<h1>  SALUT  ... <mark>" . $_SESSION['login']['nom'] . " - " . $_SESSION['login']['prenom'] . "</mark>...</h1>"; ?></legend>
                    </center>
                    <div class="container">
                        <div>
                            <label for="lname">Nom : </label>
                            <input id="lname" type="text" name="nomUpdate" value="<?php echo $_SESSION['login']['nom'] ?>">
                        </div>
                        <div>
                            <label for="fname">Prenom : </label>
                            <input id="fname" type="text" name="prenom" value="<?php echo $_SESSION['login']['prenom'] ?>">

                        </div>

                        <div>
                            <label for="email">Courriel</label>
                            <input id="email" type="text" name="email" value="<?php echo $_SESSION['login']['email'] ?>">

                        </div>
                        <div>
                            <label for="fname">Password : </label>
                            <input id="fname" type="text" name="password" value="<?php echo $_SESSION['login']['password'] ?>">

                        </div>
                    </div>
                </fieldset>
                <center> <input type="submit" value="Modifier"></center>
            <?php
        }
            ?>
            </form>
</body>

</html>