<!DOCTYPE html>
<html lang="en">
<?php session_start() ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body class="SignUp">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <img src="../styles/images/bienvenu.webp" class="img-circle" width="80" height="70" />
        <a class="navbar-brand" href="#">CrazySimpson</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="../index.php">Accueil<span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <h1> Veuillez Entrez vos Informations </h1><i class="fa-solid fa-person"></i>
    <br>
    <br>
    <form method="post" action="../controllers/InscriptionController.php" class="form">
        <fieldset>
            <legend>ENREGISTREMENT</legend>
            <div>
                <label for="lname">Nom : </label>
                <input id="lname" type="text" name="nom">
            </div>
            <div>
                <label for="fname">Prenom : </label>
                <input id="fname" type="text" name="prenom">
            </div>
            <div>
                <label for="email">Courriel</label>
                <input id="email" type="text" name="email">

            </div>
            <div>
                <label for="pwd">Mot de passe</label>
                <input id="pwd" type="text" name="password">

            </div>
        </fieldset>
        <input type="submit" value="Enregistrer">
    </form>
</body>

</html>