<?php

require_once 'myPDO.include.php' ;

class Contact {

	private $idContact = null;
	private $idPers = null;
	private $objet = null;
	private $message = null;
	private $pieceJointe = null;
	
	public function getId() {
		return $this->idContact;
	}

	public function getIdPers() {
		return $this->idPers;
	}

	public static function insererDemandeContact($nom, $prenom, $mail, $tel, $objet, $message, $pieceJointe) {
		$nom = preg_replace("/[^[:alnum:][:space:]]/u", '', $nom);
		$prenom = preg_replace("/[^[:alnum:][:space:]]/u", '', $prenom);
		if(strlen($tel) == 10) {     	   	
        
			/*$insert = myPDO::getInstance()->prepare("INSERT INTO contact(nom, prenom, mail, tel, objet, message, pieceJointe) 
													 VALUES(?, ?, ?, ?, ?, ?, ?)");
	        $insert->execute(array($nom, $prenom, $mail, $tel, $objet, $message, $pieceJointe));*/
        	$ok = "Votre message a bien été envoyé !";
    	}
	    else {
	    	echo "Numéro de téléphone non valide !";
		}
	}

}