<?php
	//	Evenement
	require_once('Evenement.class.php');
	
	class Salle
	{
	    private $id;
	    public $libelle;
		public $listeDesEvenements;

		public function __construct()
		{	
	        $nbArguments = func_num_args();
	        switch($nbArguments)
	        {
	            case 0: // action du constructeur à 0 paramètre
	                break;
	            case 2 :
	            	$this->id = func_get_arg(0);
	                $this->libelle = func_get_arg(1);
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

		public static function getListeSalles()
		{
			include '../../includes/sqlConnect.php';

        	try {
		    	$recuperationSalle = $bdd->prepare('SELECT id, libelle FROM salle Order by libelle ASC');
		    	$recuperationSalle->execute();

	        	$listeSalle = array();
        		while($res = $recuperationSalle->fetch()){
        			$uneSalle = new Salle($res['id'], $res['libelle']);
					$listeSalle[] = $uneSalle; //insertion d un evenement dans le tableau
				}
				return $listeSalle;
        	} catch (Exception $e) {
        		echo "Erreur de connexion !";
        	}
		}

		public static function affichageSalle($listeDeSalles)
		{	
			$tab = ("<table border><th></th><th>libelle</th>");
			foreach($listeDeSalles as $uneSalle){
					$tab =$tab.("<tr>");
					$tab =$tab.("<td><INPUT type='checkbox' name='id[]'' value='".$uneSalle->id."'></td>");
					$tab =$tab.("<td>".$uneSalle->libelle."</td>");
					$tab =$tab.("</tr>");
			}
			$tab = $tab.("</table>");

			return($tab);
		}

		public static function affichageComboBox($listeDeSalles)
		{
			$combo = ("<h5>Choisissez une salle</h5><select name=salle class=filter id=lstSalle>");
			$combo =$combo.("<option selected='selected' value='null'>Choisir une salle</option>");
			foreach($listeDeSalles as $uneSalle){
					$combo =$combo.("<option value='".$uneSalle->id."'>".$uneSalle->libelle."</option>");
			}
			$combo = $combo.("</select>");

			return($combo);
		}

		public static function affichageComboBoxSelected($listeDeSalles, $idEvenement)
		{
			$combo = ("<h5>Salle</h5><select name=lstSalle class=filter id=lstSalle>");
			foreach($listeDeSalles as $uneSalle){
				if ($uneSalle->id == Salle::getIDSalleEvenement($idEvenement)) {
					$combo = $combo.("<option value='".$uneSalle->id."' selected='".Salle::getSalleEvenement($idEvenement)."'>".$uneSalle->libelle."</option>");
				} else {
					$combo = $combo.("<option value='".$uneSalle->id."'>".$uneSalle->libelle."</option>"); 
				}
			}
			$combo = $combo.("</select>");

			return($combo);
		}

		public static function getSalleEvenement($idEvenement)
		{
			include '../../includes/sqlConnect.php';

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

		public static function getIDSalleEvenement($idEvenement) 
		{
			include '../../includes/sqlConnect.php';

        	try {
        		$req = "SELECT s.id FROM salle as s, evenement as evt WHERE s.id = evt.idSalle AND evt.id = '$idEvenement'";
		    	$recuperationSalleEvenement = $bdd->prepare($req);
		    	$recuperationSalleEvenement->execute();
		    	$salleEvenement = $recuperationSalleEvenement->fetch();
				return $salleEvenement["id"];
        	} catch (Exception $e) {
        		echo "Erreur de connexion !";
        	}
		}
	}
?>