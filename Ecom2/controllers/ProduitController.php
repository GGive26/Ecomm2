<?php
include("C:/wamp64/www/Ecom2/models/modelProduit.php");


class ProduitController
{
    private $model;
    public function __construct(ModelProduit $model)
    {
        $this->model = $model;
    }

    public   function getProduit()
    {
        return $this->model->getProduit();
    }
    public function addProduit(Produit $produit)
    {
        return $this->model->addProduit($produit);
    }
    public function deleteProduit($nom)
    {
        return $this->model->deleteProduit($nom);
    }
}
$servername = "localhost";
$dbname = "projet-ecom2";
$user = "root";
$pass = "";
try {
    $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $model = new ModelProduit($dbco);
    $controller = new ProduitController($model);

    //ajout dans la db
    $nomEffacer = $_POST["nameDelete"];

    if ($_POST != null && $nomEffacer == null) {
        $nom = $_POST["nomProduit"];
        $prix = $_POST["prixProduit"];
        $image = $_POST["img"];
        $desc = $_POST["description"];
        $produit = new Produit($nom, $prix, $image, $desc);

        $produits = $controller->addProduit($produit);
        header("location:../views/Acceuil.php");
    } else if ($_POST != null && $nomEffacer != null) {

        $delete = $controller->deleteProduit($nomEffacer);
        header("location:../views/Acceuil.php");
    }

    $utilisateurs = $controller->getProduit();

    include("C:/wamp64/www/Ecom2/views/Acceuil.php");
} catch (PDOException $e) {
    echo "Erreur de connexion: " . $e->getMessage();
}
