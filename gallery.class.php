<?php

require_once 'myPDO.include.php';

class Gallery
{
    private $id;
    private $url;

    public function getId(): int
    {
        return $this->id;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    public static function getAll(): array
    {
        $request =<<<SQL
SELECT * FROM gallery
SQL;
        $pdo = myPDO::getInstance()->prepare($request);
        $pdo->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
        $res = $pdo->execute([]);

        if ($res) {
            return $res->fetchAll();
        } else {
            throw new Exception('Erreur, aucune photo trouvée');
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