<?php

require_once 'myPDO.include.php' ;

class Produit {

	private $idProduit = null;
	private $nomProduit = null;
	private $descProduit = null;
    private $prix = [];
    private $volumes = [];

	public function getId(): ?int
    {
		return $this->idProduit;
	}

	public function getNom(): ?string
    {
		return $this->nomProduit;
	}

    public function getDescription(): ?string
    {
        return $this->descProduit;
    }

    public function getPrix()
    {
        $b = Produit::getVolumes();
        for($i = 0; $i < count($b); $i++) {
            $this->prix[] = Gamme::getAllFromID($this->idProduit, $b[$i])->getPrix();
        }
        return $this->prix;
    }

    public function getVolumes(): array
    {
        return Gamme::getContenances($this->idProduit);
    }

	public static function createFromID($idProduit) {
        $request =<<<SQL
SELECT * FROM produit WHERE idProduit = ? ORDER BY idProduit
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