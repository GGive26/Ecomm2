<?php
session_start();
//inclure la page de connexion
include_once('../models/connexion.php');


//creer la session 
if (!isset($_SESSION['panier'])) {
    //s'il n'existe pas une session on creer une et on mets un tableau a l'interieur
    $_SESSION['panier']['idproduit'] = array();
}

//recuperation de l'id dans le lien
if (isset($_GET['idproduit'])) {
    //si un id a ete envoye alors :
    $id = $_GET['idproduit'];

    $response = $dbco->prepare("SELECT * FROM produit WHERE idproduit =$id");
    $response->execute();
    if (empty($response->fetch(PDO::FETCH_ASSOC))) {
        //si ce produit n'existe pas 
        die("ce produit n'existe pas");
    }
    //ajouter le produit dans le panier (le tableau )

    if (isset($_SESSION['panier'][$id])) { //si le produit est deja dans le panier 

        $_SESSION['panier'][$id]++; //represente la quantite
    } else {
        //si non on ajoute le produit
        $_SESSION['panier'][$id] = 1;
    }
    //redirection vers la page index.php
    header("location:Acceuil.php");
}
