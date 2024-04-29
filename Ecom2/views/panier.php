<?php
session_start();

include_once('../models/connexion.php');

//suprimer les produits
//si la variable del existe
if (isset($_GET['del'])) {
    $id_del = $_GET['del'];
    //supression
    unset($_SESSION['panier'][$id_del]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Panier</title>
</head>

<body class="panier">
    <a href="Acceuil.php" class="link">Boutique</a>
    <section>
        <table>
            <tr>
                <th></th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Quantite</th>
            </tr>
            <?php
            $total = 0;

            //liste des produits
            //recuperer les cles du tableau session
            if (isset($_SESSION['panier']) && is_array($_SESSION['panier'])) {
                $ids = array_keys($_SESSION['panier']);
            }

            //s'il n'y a aucune cle dans le tableau
            if (empty($ids)) {
                echo "votre panier est vide";
            } else {
                $produits = $dbco->prepare("SELECT * FROM produit WHERE idproduit IN(" . implode(',', $ids) . ")");


                $produits->execute();

                //liste de s produits avec une boucle foreach
                foreach ($produits as $produit) :
                    //calculer le total (prix unitaire * quantite)
                    //et ajouter chaque resultat a chaque tours de boucle 
                    $total = $total + $produit['prixProduit'] * $_SESSION['panier'][$produit['idproduit']];

            ?>
                    <tr>
                        <td><img src="../images/<?= $produit['img_url'] ?>" alt=""></td>
                        <td><?= $produit['nomProduit'] ?></td>
                        <td><?= $produit['prixProduit'] ?></td>
                        <td><?= $_SESSION['panier'][$produit['idproduit']] ?></td>
                        <td><a href="panier.php?del=<?= $produit['idproduit'] ?>"><img src="../styles/images/R.png"></a></td>
                    </tr>
            <?php
                endforeach;
            }
            ?>
            <tr class="total">
                <th>Total: <?= $total ?> $</th>
            </tr>
        </table>
    </section>
    <div id="paypal-button-container">
    </div>

    <script src="https://www.paypal.com/sdk/js?client-id=AamvXsilSnsqb0PDfRSOmVWb1YOt5lRUviwAaox8sIjfO0m5p6TjIhN_jQWjI8j7dY3BLtUraAs_OBSe&currency=CAD"></script>

    <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '<?= $total ?>'
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    alert('Transaction complete par' + details.payer.name.given_name + '!');
                });
            }
        }).render('#paypal-button-container').then(function() {

        });
    </script>

</body>

</html>