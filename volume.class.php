<?php

require_once 'myPDO.include.php' ;

class Volume {

	private $idVolume = null;
	private $libVolume = null;
	private $volume = null;

	public function getId() {
		return $this->idVolume;
	}

	public function getNom() {
		return $this->libVolume;
	}

	public function getVolume() {
		return $this->volume;
	}
    
    public function getAll() {
		$vol = myPDO::getInstance()->prepare('SELECT * FROM volume');
		$vol->execute();
		$vol->setFetchMode(PDO::FETCH_CLASS, "Volume");
        $rep = null;
		while(($v = $vol->fetch())) {
			$rep .= $v->getNom();
		}
		return $rep;
	}

	public static function createFromID($id) {
		$vol = myPDO::getInstance()->prepare('SELECT * FROM volume WHERE idVolume = :id');
		$vol->execute(array(':id' => $id));
		$vol->setFetchMode(PDO::FETCH_CLASS, "Volume");
		if(($v = $vol->fetch()) !== FALSE) {	
			return $v;
		}
		else {
			throw new Exception('Volume introuvable');
		}
		return $img;
	}

}