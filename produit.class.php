<?php

require_once 'myPDO.include.php' ;

class Produit {

	private $idProduit = null;
	private $idVolume = null;
	private $nomProduit = null;
	private $prixProduit = null;

	public function getId() {
		return $this->idProduit;
	}

	public function getNom() {
		return $this->nomProduit;
	}

	public function getPrix() {
		return $this->prixProduit;
	}

	public static function getProduits() {
		$images = myPDO::getInstance()->prepare('SELECT * FROM produit');
		$images->execute();
		$images->setFetchMode(PDO::FETCH_CLASS, "Produit");
		$img = null;

		while($i = $images->fetch()) {			
			$img .= $i->getNom()." ".$i->getPrix()."€<br>";
		}

		return $img;
	}

}