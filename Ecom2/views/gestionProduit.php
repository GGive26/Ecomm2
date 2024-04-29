<!DOCTYPE html>
<html lang="en">
<?php session_start() ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GestionProduit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body class="acceuilAdmin">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <img src="../styles/images/bienvenu.webp" class="img-circle" width="80" height="70" />
        <a class="navbar-brand" href="#">CrazySimpson</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="../views/Acceuil.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../views/profile.php">Profil</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">gestionUsers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">gestionProduct</a>
                </li>
            </ul>
        </div>
    </nav>
    <center>
        <h1>Plateforme de Gestion des Produits</h1>
    </center>

    <form method="post" action="../controllers/ProduitController.php" class="form">
        <fieldset>
            <legend>Ajout des produits</legend>
            <div>
                <label for="name">Nom du produit</label>
                <input id="name" type="text" name="nomProduit">
            </div><br>
            <div>
                <label for="prixProduit">Prix : </label>
                <input id="prixProduit" type="number" name="prixProduit">
            </div><br>
            <div>
                <label for="images">Images</label>
                <input type="file" id="images" name="img"><br>
                <p>les mangas sont : demonSlayer,naruto,kuroko,myheroacademia,kingdom, lesSimpson,jujutsukaisen et detectiveConan </p>
                <p>Dirigez vous vers : disque localC/wammp64/www/ecom2/images. vous y trouverez les images souhaiter </p>

            </div>
            <div>
                <label for="description">Description</label>
                <input id="description" type="text" name="description">

            </div><br>
        </fieldset>
        <input type="submit" value="Ajout">
    </form>
    <br><br>
    <form class="form" action="../controllers/ProduitController.php" method="post">

        <fieldset>
            <legend>Suppression des Produits</legend>
            <label for="name">le Nom du produit</label>
            <input type="text" id="name" name="nameDelete"><br>

            <input type="submit" value="Supprimer">

        </fieldset>
    </form>
</body>

</html>