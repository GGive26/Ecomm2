<?php
include("../models/class/produit.php");

class ModelProduit
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getProduit()
    {

        try {
            $reponse = $this->db->prepare("SELECT * FROM produit");
            $reponse->execute();
            $produits = array();
            while ($row = $reponse->fetch(PDO::FETCH_ASSOC)) {
                $produits[] = new Produit($row['nomProduit'], $row['quantiteProduit'], $row['prixProduit'], $row['img_url'], $row['description']);
            }
            return $produits;
        } catch (PDOException $e) {
            echo "Erreur lors de l'exécution de la requête :" . $e->getMessage();
            return array();
        }
    }
    public function addProduit(Produit $produit)
    {

        $servername = "localhost";
        $username = 'root';
        $password = '';
        try {

            $conn = new PDO("mysql:host = $servername; dbname=projet-ecom2", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $nom = $produit->getNomProduit();
            $desc = $produit->getDescription();
            $prix = $produit->getPrix();
            $image = $produit->getImage();


            // Requete preparer avec des marquer interrogatif
            $sth = $conn->prepare("INSERT INTO produit VALUES (NULL,?,?,?,?);");
            $sth->execute(array(
                $nom,
                $prix,
                $desc,
                $image,
            ));
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    public function deleteProduit($nom)
    {

        $servername = "localhost";
        $username = 'root';
        $password = '';
        try {

            $conn = new PDO("mysql:host = $servername; dbname=projet-ecom2", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sth = $conn->prepare("DELETE FROM produit WHERE nomProduit=:nom");
            $sth->bindParam(':nom', $nom);
            $sth->execute();

            return true;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
}
