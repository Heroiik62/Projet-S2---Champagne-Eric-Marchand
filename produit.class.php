<?php

require_once 'myPDO.include.php' ;

class Produit {

	private $idProduit = null;
	private $nomProduit = null;
	private $descProduit = null;
    private $prix = 0;
    private $volumes = [75, 37.5, 300];

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

    public function getPrix(): int
    {
        return $this->prix;
    }

    public function getVolumes(): array
    {
        return $this->volumes;
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