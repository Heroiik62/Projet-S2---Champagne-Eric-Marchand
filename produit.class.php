<?php

require_once 'myPDO.include.php' ;

class Produit {

	private $idProduit = null;
	private $nomProduit = null;
	private $descProduit = null;

	public function getId() {
		return $this->idProduit;
	}

	public function getNom() {
		return $this->nomProduit;
	}

	public function getDescription() {
		return $this->descProduit;
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

	public static function getProduits() {
		$images = myPDO::getInstance()->prepare('SELECT * FROM produit ORDER BY idProduit');
		$images->execute();
		$images->setFetchMode(PDO::FETCH_CLASS, "Produit");
		$img = null;
        $img = <<<HTML
        <div class="container col-md-8"><nav class="navbar navbar-expand-lg navbar-dark bg-dark row"><ul>
HTML;
		while($i = $images->fetch()) {
            $href = strtolower($i->getNom());
            $href = preg_replace("/ /", "-", $href);
			$img .= "<li id='produits'><a href ='#{$href}'>{$i->getNom()}</a></li>";
		}
        $img .= "</ul></nav></div>";
		return $img;
	}
    
    public static function getProduitsAvecGamme() {
		$produit = myPDO::getInstance()->prepare('SELECT * FROM produit ORDER BY idProduit');
		$produit->execute();
		$produit->setFetchMode(PDO::FETCH_CLASS, "Produit");
		$rep = null;
        $rep = <<<HTML
        <hr>
        <div class="container">        
HTML;
		while($p = $produit->fetch()) {
            $href = strtolower($p->getNom());
            $href = preg_replace("/ /", "-", $href);
            $rep .= <<<HTML
            <h1 class="display-4" id='{$href}'>{$p->getNom()}</h1>
HTML;
            /*$img = Gamme::getImageFromID($p->getId(), Gamme::getContenances($p->getId()));*/
            
            /*$rep .= "<img src='img/{$img->getImage()}'><br>";*/
            
            /*$rep .= Volume::createFromID(Gamme::getContenances($p->getId()))->getNom();*/
            $test = Gamme::getContenances($p->getId())."<hr>";       
            
		}
        $rep .= "</div>";
		return $rep;
	}

}