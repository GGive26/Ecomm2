<?php
session_start();

include('../models/connexion.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AcceuilClient</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

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
                <li class="nav-item active">
                    <a class="nav-link" href="#">Accueil</a>
                </li>
                <li>
                    <a href="../views/panier.php" class="nav-item">Panier<span><?php
                                                                                if (isset($_SESSION['panier']) && is_array($_SESSION['panier'])) {
                                                                                    echo array_sum($_SESSION['panier']);
                                                                                } ?></span></a>
                    <section class="products_list">
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="../views/gestionProduit.php">gestionProduit</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="../views/Profile.php">Profil</a>
                </li>
            </ul>
        </div>
    </nav>
    <center>
        <h3>Bienvenue dans notre Site dedié aux Otakus</h3>
    </center>

    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php
                //recuperation et affichage des produits 
                $response = $dbco->prepare("SELECT * FROM produit");
                $response->execute();
                while ($row = $response->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <div class="col">
                        <div class="card shadow-sm" style="width: 18rem;">
                            <img src="../images/<?php echo $row["img_url"] ?>" name="img_url" value="<?php echo $row['nomProduit'] ?>" class="card-img-top" alt="...">
                            </text>
                            <div class="card-body">
                                <p class="card-text" name="name" value="<?php echo $row['nomProduit'] ?>"><b><?php echo $row["nomProduit"] ?></b> </p>
                                <p class="card-text" name="description" value="<?php echo $row['description'] ?>"><?php echo $row["description"] ?> </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <small class="text-body-secondary" name="price" value="<?php echo $row['prixProduit'] ?>"><?php echo $row["prixProduit"] ?> $CAD</small><br>
                                        <div>
                                            <button type="button" class="btn btn-primary"> <a href="../views/ajouter_panier.php?idproduit=<?php echo $row['idproduit'] ?>">Ajouter au panier</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

</body>

</html>