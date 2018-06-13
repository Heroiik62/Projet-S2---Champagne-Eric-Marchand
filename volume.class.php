<?php

require_once 'myPDO.include.php' ;

class Volume {

	private $idVolume = null;
	private $libVolume = null;
	private $volume = null;

	public function getId() {
		return $this->idVolume;
	}

}