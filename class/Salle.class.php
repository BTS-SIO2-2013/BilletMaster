<?php
	
	class Salle
	{
	    private $id;
	    private $libelle;

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
			include './includes/sqlConnect.php';

        	try {
		    	$recuperationSalle = $bdd->prepare('SELECT id, libelle FROM salle');
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
	}
?>