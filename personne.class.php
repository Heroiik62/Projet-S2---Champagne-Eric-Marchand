?php

require_once 'myPDO.include.php' ;

class Personne {

	private $idPers = null;

	public function getId() {
		return $this->idPers;
	}

}