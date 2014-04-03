<?php

	//	Connexion
	require_once('sqlConnect.php');

    // Recuperation des donnees du formulaire
    $id = $_POST['idSalle'];
    $libelle = $_POST['libelle'];

    // Si la variable n'est pas vite => existe donc update
    if($id!=""){
    	try {
    		// TODO : fichier comprenant toutes les requetes stockees
    		$updateSalle = $bdd->prepare('UPDATE salle SET `libelle`=:libelle WHERE `id`=:id');
			$updateSalle->execute(array( // Update dans la table salle
				'libelle' => $libelle,
				'id' => $id
			));
    	} catch (Exception $e) {
    		echo $e;
    	}
    }else{ //la salle existe pas => create
    	try {
    		// TODO : fichier comprenant toutes les requetes stockees
    		$insertIntoSalle = $bdd->prepare('INSERT INTO salle(libelle) VALUES(:libelle)');
			$insertIntoSalle->execute(array( // Insert dans la table personne
				'libelle' => $libelle,
			));
    	} catch (Exception $e) {
    		echo $e;
    	}
	}
	
	// Redirection
	header('Location: ../crudSalle.php');

?>