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

	//API Part, don't edit this
    public static function getAll(): array
    {
        $request =<<<SQL
SELECT * FROM produit
SQL;
        $pdo = myPDO::getInstance()->prepare($request);
        $pdo->setFetchMode(PDO::FETCH_OBJ);
        $res = $pdo->execute([]);

        if ($pdo->execute([])) {
            return $pdo->fetchAll();
        } else {
            throw new Exception('Erreur, aucun produit trouvé');
        }
    }

    public static function addPhoto($image): array
    {
        $request =<<<SQL
INSERT INTO gallery (url) VALUES (?)
SQL;
        $pdo = myPDO::getInstance()->prepare($request);
        $pdo->execute([$image]);

        return self::getAll();
    }

    public static function removePhoto($image): array
    {
        $request =<<<SQL
DELETE FROM gallery WHERE id = ?
SQL;
        $pdo = myPDO::getInstance()->prepare($request);
        $pdo->execute([$image]);

        return self::getAll();
    }

    public static function updatePhoto($image): array
    {
        $request =<<<SQL
UPDATE gallery SET url = ? WHERE id = ?
SQL;
        $pdo = myPDO::getInstance()->prepare($request);
        $pdo->execute([$image['url'], $image['id']]);

        return self::getAll();
    }

}