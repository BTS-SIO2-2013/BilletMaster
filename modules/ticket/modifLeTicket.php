<?php
    include '../../includes/sqlConnect.php';
    
	if($_POST['idTicket'] && !empty($_POST['numero']) && !empty($_POST['libelle']) && !empty($_POST['etat'])) {
		$id =  $_POST['idTicket'];
		$numero =  $_POST['numero'];
		$libelle =  $_POST['libelle'];
		$etat =  $_POST['etat'];
		$dateValidation =  $_POST['dateValidation'];
		$idUtilisateur =  $_POST['idUtilisateur'];

		try {
			// TODO : fichier comprenant toutes les requetes stockees
			$updatePersonne = $bdd->prepare('UPDATE ticket SET `numero`=:numero,`libelle`=:libelle, `etat`=:etat, `dateValidation`=:dateValidation, `idUtilisateur`=:idUtilisateur WHERE `id`=:id');
			$updatePersonne->execute(array( // Update dans la table personne
				'id' => $id,
				'numero' => $numero,
				'libelle' => $libelle,
				'etat' => $etat,
				'dateValidation' => $dateValidation,
				'idUtilisateur' => $idUtilisateur
				));

		} catch (Exception $e) {
			echo $e;
		}
	
	}

?>