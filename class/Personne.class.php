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
	    private $admin;

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


				case 8 : //action du constructeur à 12 paramètres
	                $this->id = func_get_arg(0);
	                $this->nom = func_get_arg(1);
	                $this->prenom = func_get_arg(2);
	                $this->adresseMail = func_get_arg(3);
	                $this->telephone = func_get_arg(4);
	                $this->login = func_get_arg(5);
	                $this->motDePasse = func_get_arg(6);
	                $this->admin = func_get_arg(7);
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

		public static function getListePersonnes()
		{
			include './includes/sqlConnect.php';

        	try {
		    	$recuperationPersonne = $bdd->prepare('SELECT personne.id, personne.nom, personne.prenom, personne.adresseMail, personne.telephone, personne.login, personne.motDePasse, employe.admin FROM personne, employe WHERE employe.idEmploye = personne.id');
		    	$recuperationPersonne->execute();

	        	$listePersonnes = array();
        		while($res = $recuperationPersonne->fetch()){
        			$unePersonne = new Personne($res['id'], $res['nom'], $res['prenom'], $res['adresseMail'],  $res['telephone'],  $res['login'],  $res['motDePasse'], $res['admin']);
					$listePersonnes[] = $unePersonne; //insertion d un evenement dans le tableau
				}
				return $listePersonnes;
        	} catch (Exception $e) {
        		echo "Erreur de connexion !";
        	}
		}

		public static function affichagePersonne($listeDePersonnes)
		{	
			$tab = ("<table border><th></th><th>Nom</th><th>Prenom</th><th>Adresse mail</th><th>Admin</th>");
			foreach($listeDePersonnes as $unePersonne){
					$tab =$tab.("<tr>");
					$tab =$tab.("<td><INPUT name = 'idEmploye[]' type='checkbox' value='".$unePersonne->id."'></td>");
					$tab =$tab.("<td>".$unePersonne->nom."</td>");
					$tab =$tab.("<td>".$unePersonne->prenom."</td>");
					$tab =$tab.("<td>".$unePersonne->adresseMail."</td>");
					if($unePersonne->admin == '1'){
						$tab =$tab.("<td><INPUT type='checkbox' checked></td>");	
					} else {
						$tab =$tab.("<td><INPUT type='checkbox'></td>");
					}
					$tab =$tab.("</tr>");
			}
			$tab = $tab.("</table>");

			return($tab);
		}
	}
?>