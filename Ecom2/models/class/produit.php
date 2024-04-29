<?php

class Produit
{

    private string $description;
    private string $img_url;
    private string $nomProduit;

    private string $prixProduit;

    public function __construct($np, $pp, $i, $d)
    {
        $this->nomProduit = $np;
        $this->prixProduit = $pp;
        $this->img_url = $i;
        $this->description = $d;
    }
    public function getNomProduit()
    {
        return $this->nomProduit;
    }

    public function getPrix()
    {
        return $this->prixProduit;
    }

    public function setNomProduit($newNom)
    {
        $this->nomProduit = $newNom;
    }
    public function setPrix($newPrix)
    {
        $this->prixProduit = $newPrix;
    }
    public function getImage()
    {
        return $this->img_url;
    }

    public function setImage($newImg)
    {
        $this->img_url = $newImg;
    }
    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($newdesc)
    {
        $this->description = $newdesc;
    }
}
