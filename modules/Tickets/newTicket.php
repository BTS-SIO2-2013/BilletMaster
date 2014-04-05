<?php 
		 if (!defined('BASE_URI')) define ('BASE_URI',''.$_SERVER['DOCUMENT_ROOT'].'/BilletMaster');
	    include BASE_URI.'/includes/sqlConnect.php';
		if($_POST['evenementId'] && !empty($_POST['numero']) && !empty($_POST['libelle']) && !empty($_POST['etat'])) {
			$evenement =  $_POST['evenementId'];

			if($_POST['idUtilisateur'] == ""){
				$requete = 'INSERT INTO ticket(numero, libelle, etat, dateValidation, idUtilisateur, idEvenement) 
						values ("'.$_POST['numero'].'",  "'.$_POST['libelle'].'",  "'.$_POST['etat'].'", "'.$_POST['dateValidation'].'",  NULL,  "'.$evenement.'")';
				$query = $bdd->query($requete);
			}
			else if($_POST['dateValidation'] == ""){
				$requete = 'INSERT INTO ticket(numero, libelle, etat, dateValidation idUtilisateur, idEvenement) 
						values ("'.$_POST['numero'].'",  "'.$_POST['libelle'].'",  "'.$_POST['etat'].'",  NULL, "'.$_POST['idUtilisateur'].'",  "'.$evenement.'")';
				$query = $bdd->query($requete);
			}
			else{
				$requete = 'INSERT INTO ticket(numero, libelle, etat, dateValidation, idUtilisateur, idEvenement) 
						values ("'.$_POST['numero'].'",  "'.$_POST['libelle'].'",  "'.$_POST['etat'].'", "'.$_POST['dateValidation'].'", "'.$_POST['idUtilisateur'].'",  "'.$evenement.'")';
				$query = $bdd->query($requete);
			}
		
		}
?>