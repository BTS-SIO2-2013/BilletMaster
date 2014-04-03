<?php

	//	Connexion
    require_once('sqlConnect.php');

    // Recuperation des donnees du formulaire
    $id = $_POST['idEvenement'];
    $dateDebutVente = $_POST['dateDebutVente'];
    $dateFinVente = $_POST['dateFinVente'];
    $dateDebutEvenement = $_POST['dateDebutEvenement'];
    $dateFinEvenement = $_POST['dateFinEvenement'];
    $libelle = $_POST['libelle'];


    // Si la variable n'est pas vide => existe donc update
    if($id!=""){
    	try {
    		// TODO : fichier comprenant toutes les requetes stockees
    		$updateEvenement = $bdd->prepare('UPDATE evenement SET `dateDebutVente`=:dateDebutVente,`dateFinVente`=:dateFinVente, `dateDebutEvenement`=:dateDebutEvenement, `dateFinEvenement`=:dateFinEvenement, `libelle`=:libelle WHERE `id`=:id');
			$updateEvenement->execute(array( // Update dans la table Evenement
				'dateDebutVente' => $dateDebutVente,
				'dateFinVente' => $dateFinVente,
				'dateDebutEvenement' => $dateDebutEvenement,
				'dateFinEvenement' => $dateFinEvenement,
				'libelle' => $libelle,
				'id' => $id
			));
    	} catch (Exception $e) {
    		echo $e;
    	}
    }else{ //l'evenement existe pas => create
    	try {
    		// TODO : fichier comprenant toutes les requetes stockees
    		$insertIntoEvenement = $bdd->prepare('INSERT INTO evenement(dateDebutVente, dateFinVente, dateDebutEvenement, dateFinEvenement, libelle) VALUES(:dateDebutVente, :dateFinVente, :dateDebutEvenement, :dateFinEvenement, :libelle');
			$insertIntoEvenement->execute(array( // Insert dans la table evenement
				'dateDebutVente' => $dateDebutVente,
				'dateFinVente' => $dateFinVente,
				'dateDebutEvenement' => $dateDebutEvenement,
				'dateFinEvenement' => $dateFinEvenement,
				'libelle' => $libelle
				
			));
    	} catch (Exception $e) {
    		echo $e;
    	}
	}
	
	// Redirection
	header('Location: ../crudEvenement.php');

?>