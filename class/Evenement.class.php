<?php
	
	class Evenement
	{
	    private $id;
	    private $dateDebutVente;
	    private $dateFinVente;
	    private $dateDebutEvenement;
	    private $dateFinEvenement;
	    private $libelle;
	    private $idEmploye;
	    private $idSalle;

		public function __construct()
		{	
	        $nbArguments = func_num_args();
	        switch($nbArguments)
	        {
	            case 0: // action du constructeur à 0 paramètre
	                break;
				case 8 : //action du constructeur à 12 paramètres
	                $this->id = func_get_arg(0);
	                $this->dateDebutVente = func_get_arg(1);
	                $this->dateFinVente = func_get_arg(2);
	                $this->dateDebutEvenement = func_get_arg(3);
	                $this->dateFinEvenement = func_get_arg(4);
	                $this->libelle = func_get_arg(5);
	                $this->idEmploye = func_get_arg(6);
	                $this->idSalle = func_get_arg(7);
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

		public static function getListeEvenements()
		{
			include './includes/sqlConnect.php';

        	try {
		    	$recuperationEvenement = $bdd->prepare('SELECT evt.id, evt.dateDebutVente, evt.dateFinVente, evt.dateDebutEvenement, evt.dateFinEvenement, evt.libelle, evt.idEmploye, evt.idSalle FROM evenement as evt, employe as e, personne as p, salle as s WHERE p.id = e.idEmploye AND e.idEmploye = evt.idEmploye AND s.id = evt.idSalle');
		    	$recuperationEvenement->execute();

	        	$listeEvenements = array();
        		while($res = $recuperationEvenement->fetch()){
        			$unEvenement = new Evenement($res['id'], $res['dateDebutVente'], $res['dateFinVente'], $res['dateDebutEvenement'],  $res['dateFinEvenement'],  $res['libelle'],  $res['idEmploye'], $res['idSalle']);
					$listeEvenements[] = $unEvenement; //insertion d un evenement dans le tableau
				}
				return $listeEvenements;
        	} catch (Exception $e) {
        		echo "Erreur de connexion !";
        	}
		}

		public static function affichageEvenements($listeDesEvenements)
		{	
			$tab = ("<table border><th></th><th>Libelle</th><th>Date debut</th><th>Date fin</th><th>Salle</th>");
			foreach($listeDesEvenements as $unEvenement){
					$tab =$tab.("<tr>");
					$tab =$tab.("<td><INPUT type='checkbox' name='id[]' value='".$unEvenement->id."'></td>");
					$tab =$tab.("<td>".$unEvenement->libelle."</td>");
					$tab =$tab.("<td>".$unEvenement->dateDebutEvenement."</td>");
					$tab =$tab.("<td>".$unEvenement->dateFinEvenement."</td>");
					$tab =$tab.("<td>".Evenement::getSalleEvenement($unEvenement->id)."</td>");
					$tab =$tab.("</tr>");
			}
			$tab = $tab.("</table>");

			return($tab);
		}

		public static function getSalleEvenement($idEvenement)
		{
			include './includes/sqlConnect.php';

        	try {
        		$req = "SELECT s.libelle FROM salle as s, evenement as evt WHERE s.id = evt.idSalle AND evt.id = '$idEvenement'";
		    	$recuperationSalleEvenement = $bdd->prepare($req);
		    	$recuperationSalleEvenement->execute();
		    	$salleEvenement = $recuperationSalleEvenement->fetch();
				return $salleEvenement["libelle"];
        	} catch (Exception $e) {
        		echo "Erreur de connexion !";
        	}
		}
	}
?>