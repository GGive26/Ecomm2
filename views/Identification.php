<!DOCTYPE html>
<html lang="en">
<?php session_start() ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body class="LoginAdmin">

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

    <form class="form" action="../controllers/LoginController.php" method="POST">

        <fieldset>
            <legend>
                INFORMATION DE CONNECTION
            </legend><i class="fa-solid fa-person"></i>
            <label for="user_name">Identifiant : </label>
            <input type="email" id="user_name" name="email"><br><br>

            <label for="password">Password : </label>
            <input type="text" id="password" name="password"><br>


        </fieldset>
        <input type="submit" value="Confirmrer">
        <button><a href="../index.php">Annuler</a></button><br><br>

        <h3 style="color: red;"> Si vous n'etes pas enregistrez chez nous,Le site ne seras pas accessible malheusement</h3>
    </form>
</body>

</html>