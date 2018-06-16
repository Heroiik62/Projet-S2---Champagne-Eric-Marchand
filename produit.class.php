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
        $request =<<<SQL
SELECT * FROM produit ORDER BY idProduit WHERE idProduit = ?
SQL;
        $produit = myPDO::getInstance()->prepare($request);
        $produit->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
        $produit->execute([$idProduit]);

        if ($produit)
            return $produit->fetchAll();
        else
            throw new Exception('Erreur, aucun produit trouvé');
	}

	public static function getProduits() {
        $request =<<<SQL
SELECT * FROM produit ORDER BY idProduit
SQL;
        $produit = myPDO::getInstance()->prepare($request);
        $produit->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
        $produit->execute([]);

        if ($produit)
            return $produit->fetchAll();
        else
            throw new Exception('Erreur, aucun produit trouvé');
//		while($i = $images->fetch()) {
//            $href = strtolower($i->getNom());
//            $href = preg_replace("/ /", "-", $href);
//			$img .= "<li id='produits'><a href ='#{$href}'>{$i->getNom()}</a></li>";
//		}
//        $img .= "</ul></nav></div>";
	}
    
    public static function getProduitsAvecGamme() {
	    $request =<<<SQL
SELECT * FROM produit ORDER BY idProduit
SQL;
		$produit = myPDO::getInstance()->prepare($request);
        $produit->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
        $produit->execute([]);

        if ($produit)
            return $produit->fetchAll();
        else
            throw new Exception('Erreur, aucun produit trouvé');
	}

}