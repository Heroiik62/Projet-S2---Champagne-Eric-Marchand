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
            <h1 class="display-4 nomProd" id='{$href}'>{$p->getNom()}</h1>
HTML;
            $test = Gamme::getContenances($p->getId());
            $size = sizeof($test);
            for($i = 0; $i < $size; $i++) {
            	$rep .= "<div class='imgProduits'>";
            	$img = Gamme::getAllFromID($p->getId(), Volume::createFromID($test[$i])->getId())->getImage();
            	$vol = Volume::createFromID($test[$i])->getNom();
            	$rep.= "<a><img src='img/{$img}'></a><br>";
            	$rep .= "<a>{$vol}</a><br>";
            	$rep .= "</div>";
            }            
		}

        $rep .= "</div>";
		return $rep;
	}

}