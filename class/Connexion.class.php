<?php

    require_once 'Personne.class.php';

	
    class Connexion
    {	
		public function GetPersonneByLogin($login, $motDePasse)
		{
			//	Connexion
		    require_once '../../includes/sqlConnect.php';

	        try {
	        	// Comparaison du login et du mot de passe crypté en SHA256 avec ceux de la BDD
			    $requete = "SELECT * 
							FROM personne
							WHERE login = '" . $login . "'
							AND motDePasse = '".hash('sha256',$motDePasse)."'";
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
						$adresseMail = $ligne->adresseMail;
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