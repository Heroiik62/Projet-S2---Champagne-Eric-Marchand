<?php

class Commande {
    
    private $idPers = null;
    private $idProduit = null;
    private $quantite = null;
    private $message = null;
    
    public function getId() {
        return $this->idPers;
    }
    
}