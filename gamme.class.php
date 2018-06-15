<?php

require_once 'myPDO.include.php' ;

class Gamme {

	private $idGamme = null;
	private $idProduit = null;
	private $idVolume = null;
	private $prix = null;
	private $anne = null;
	private $txAlcool = null;
	private $imgProduit = null;

	public function getId() {
		return $this->idGamme;
	}

	public function getIdProduit() {
		return $this->idProduit;
	}

	public function getIdVolume() {
		return $this->idVolume;
	}

	public function getImage() {
		return $this->imgProduit;
	}
    
    public static function getImageFromID($idProduit, $idVolume) {
        $image = myPDO::getInstance()->prepare('SELECT imgProduit FROM gamme WHERE idProduit = :idProduit AND idVolume = :idVolume');
        $image->execute(array(':idProduit' => $idProduit, ':idVolume' => $idVolume));
        $image->setFetchMode(PDO::FETCH_CLASS, "Gamme");
        if(($i = $image->fetch()) !== FALSE) {
            return $i;
        }
        else {
            throw new Exception('Image introuvable');
        }
	}
    
    public static function createFromID($idProduit) {
		$produit = myPDO::getInstance()->prepare('SELECT * FROM produit WHERE idProduit = :idProduit');
		$produit->execute(array(':idProduit' => $idProduit));
		$produit->setFetchMode(PDO::FETCH_CLASS, "Produit");
		if(($p = $produit->fetch()) !== FALSE) {	
			return $p;
		}
		else {
			throw new Exception('Produit introuvable');
		}
	}
    
	public static function getContenances($idProduit) {
		$contenance = myPDO::getInstance()->prepare('SELECT * FROM gamme WHERE idProduit = :idProduit');
		$contenance->execute(array(':idProduit' => $idProduit));
		$contenance->setFetchMode(PDO::FETCH_CLASS, "Gamme");
		$rep = null;
		while($c = $contenance->fetch()) {	
			$rep .= Volume::createFromID($c->getIdVolume())->getId();
		}
		return $rep;
	}

}