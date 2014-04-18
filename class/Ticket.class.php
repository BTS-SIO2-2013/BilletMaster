<?php

class Ticket
{
    private $id;
    private $code;
    private $libelle;
    private $etat;
    private $dateValidation;
    private $idUtilisateur;
    private $idEvenement;

	public function __construct()
	{	
            $nbArguments = func_num_args();
            switch($nbArguments)
            {
                case 0: // action du constructeur à 0 paramètre
                    break;
				case 7 : //action du constructeur à 7 paramètres
                    $this->id = func_get_arg(0);
                    $this->code = func_get_arg(1);
                    $this->libelle = func_get_arg(2);
                    $this->etat = func_get_arg(3);
                    $this->dateValidation = func_get_arg(4);
                    $this->idUtilisateur = func_get_arg(5);
                    $this->idEvenement = func_get_arg(6);
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


	// ressorts tous les tickets de l'évenement sélectionné
	public static function getListeTickets($evenement)
	{
		//	Connexion
	    include '../../includes/sqlConnect.php';
        try {
        	
		    $requete = 'SELECT * 
						FROM ticket
						WHERE idEvenement = "'.$evenement.'"';

	        $resultat = $bdd->query($requete) or die("Erreur avec la requete: $requete");

	        $listeTickets = array();
        	while ($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
        		$unTicket = new Ticket($ligne['id'], $ligne['code'], $ligne['libelle'], $ligne['etat'], strtotime($ligne['dateValidation']), $ligne['idUtilisateur'], $ligne['idEvenement']);
				$listeTickets[] = $unTicket; //insertion d unticket dans le tableau
			}
			return $listeTickets;
        }
        catch (Exception $e) {
        	echo "Erreur de connexion !";
        }
	}

	// ressorts le ticket séléctionné
	public static function getUnTicket($idTicket)
	{
		//	Connexion
	    include '../../includes/sqlConnect.php';

        try {
        	
		    $requete = 'SELECT * 
						FROM ticket
						WHERE id = "'.$idTicket.'"';

	        $resultat = $bdd->query($requete) or die("Erreur avec la requete: $requete");

	        $ligne = $resultat->fetch(PDO::FETCH_ASSOC);
        	$leTicket = new Ticket($ligne['id'], $ligne['code'], $ligne['libelle'], $ligne['etat'], strtotime($ligne['dateValidation']), $ligne['idUtilisateur'], $ligne['idEvenement']);

			return $leTicket;
        }
        catch (Exception $e) {
        	echo "Erreur de connexion !";
        }
	}
}