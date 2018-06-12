<?php

class Volume {
    
    private $idVolume = null;
    private $volume = null;
    
    public function getId() {
        return $this->idVolume;
    }    
    
    public static function getVolume($id) {
        $volume = myPDO::getInstance()->prepare('SELECT * 
                                                FROM volume 
                                                WHERE idVolume = :id');
        $volume->execute(array(':id' => $id));
        $volume->setFetchMode(PDO::FETCH_CLASS, 'Volume');
        if (($reponse = volume->fetch()) !== false) {
            return $reponse;
        }
        else {
        throw new Exception('Volume introuvable');
        }
    }
    
}