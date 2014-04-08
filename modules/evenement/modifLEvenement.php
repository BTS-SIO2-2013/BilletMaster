<?php 
    
    //	Connexion
	require_once '../../includes/sqlConnect.php';

	$tabData = json_decode($_POST['data']);

	if($tabData->id != '' && $tabData->dateDebutVente != '' && $tabData->dateFinVente != '' && $tabData->dateDebutEvenement != '' && $tabData->dateFinEvenement != '' && $tabData->libelle != '' && $tabData->idSalle != '') {
		$id = $tabData->id;
		$dateDebutVente = $tabData->dateDebutVente;
		$dateFinVente =  $tabData->dateFinVente;
		$dateDebutEvenement =  $tabData->dateDebutEvenement;
		$dateFinEvenement =  $tabData->dateFinEvenement;
		$libelle = $tabData->libelle;
		$idEmploye = $tabData->idEmploye;
		$idSalle =  $tabData->idSalle;
		try {
			// TODO : fichier comprenant toutes les requetes stockees
			$updateEvenement = $bdd->prepare('UPDATE evenement SET `dateDebutVente`=:dateDebutVente,`dateFinVente`=:dateFinVente, `dateDebutEvenement`=:dateDebutEvenement, `dateFinEvenement`=:dateFinEvenement, `libelle`=:libelle, `idEmploye`=:idEmploye, `idSalle`=:idSalle WHERE `id`=:id');
			$updateEvenement->execute(array( // Update dans la table personne
				'id' 					=> $id,
				'dateDebutVente' 		=> $dateDebutVente,
				'dateFinVente' 			=> $dateFinVente,
				'dateDebutEvenement' 	=> $dateDebutEvenement,
				'dateFinEvenement' 		=> $dateFinEvenement,
				'libelle'				=> $libelle,
				'idEmploye'				=> $idEmploye,
				'idSalle'				=> $idSalle
				));
		} catch (Exception $e) {
			echo $e;
		}
	}

?>