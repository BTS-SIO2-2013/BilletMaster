<?php

	class Personne
	{
	    private $id;
	    private $nom;
	    private $prenom;
	    private $adresseMail;
	    private $telephone;
	    private $login;
	    private $motDePasse;

		public function __construct()
		{	
	            $nbArguments = func_num_args();
	            switch($nbArguments)
	            {
	                case 0: // action du constructeur à 0 paramètre
	                    break;
					case 7 : //action du constructeur à 12 paramètres
	                    $this->id = func_get_arg(0);
	                    $this->nom = func_get_arg(1);
	                    $this->prenom = func_get_arg(2);
	                    $this->adresseMail = func_get_arg(3);
	                    $this->telephone = func_get_arg(4);
	                    $this->login = func_get_arg(5);
	                    $this->motDePasse = func_get_arg(6);
	                    break;
					default:
	                    echo "erreur constructeur";
	                    die();
			}
		
		}
		
		// SET / GET MAGIQUE
		public function __get ($champ)
		{
			if (property_exists($this, $champ))
				return $this->$champ;
		}
		
		public function __set ($champ, $valeur)
		{
			if (property_exists($this, $champ))
				$this->$champ = $valeur;
		}
	}
?>