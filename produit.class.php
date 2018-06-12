<?php

class Produit {
    
    private $idProduit = null;
    private $idVolume = null;
    private $nomProduit = null;
    private $anneProduit = null;
    private $prixProduit = null;
    private $txAlcool = null;
    private $descProduit = null;
    private $imgProduit = null;
    
    public function getId() {
        return $this->idProduit;
    }    
    
}