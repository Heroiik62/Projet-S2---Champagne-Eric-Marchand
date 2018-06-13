<?php

require_once 'myPDO.include.php' ;

class Commande {

	private $idPers = null;
	private $idProduit = null;
	private $quantite = null;
	private $message = null;

	public function getIdPers() {
		return $this->idPers;
	}

	public function getIdProduit() {
		return $this->idProduit;
	}

}