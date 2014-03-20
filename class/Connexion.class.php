<?php

    require_once("Personne.class.php");
	
    class Connexion
    {	
		public function GetPersonneByLogin($login, $motDePasse)
		{
			//	Connexion
		    require_once 'includes/sqlConnect.php';

	        try {
	        	// Comparaison du login et du mot de passe avec ceux de la BDD
			    $requete = "SELECT * 
							FROM personne
							WHERE login = '" . $login . "'
							AND motDePasse = '" . $motDePasse . "'";
				// $login = $bdd->prepare($requete, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
				// $pass = hash('md5',$motDePasse,TRUE);
				// $arr = array(':login' => $_POST['login'], ':motDePasse' => $pass);
				// $login->execute($arr);
				// $member = $login->fetchAll();
				// print_r($member);
		        $resultat = $bdd->query($requete) or die("Erreur avec la requete: $requete");
		        if ($resultat->rowCount() != 1)
				{
					return null;
				}
		        else
		        {
		        	while ($ligne = $resultat->fetch(PDO::FETCH_OBJ)) {
						$id = $ligne->id;
						$nom = $ligne->nom;
						$prenom = $ligne->prenom;
						$adresseMail = $ligne->mail;
						$telephone = $ligne->telephone;
						$login = $ligne->login;
			            $motDePasse = $ligne->motDePasse;
		        	}
					
		            // Création d'une personne
		            $laPersonne= new Personne($id, $nom, $prenom, $adresseMail, $telephone, $login, $motDePasse) or die("Erreur constructeur Personne");
		            return $laPersonne;
		        }
	        } catch (Exception $e) {
	        	echo "Erreur de connexion !";
	        }
		}
	}
?>