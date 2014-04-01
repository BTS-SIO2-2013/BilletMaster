<?php

	//	Connexion
    require_once('sqlConnect.php');

    // Recuperation des donnees du formulaire
    $id = $_POST['idSalle'];
    $libelle = $_POST['libelle'];


    // Si la variable n'est pas vite => existe donc update
    if($id!=""){
    	try {
    		$updateSalle = $bdd->prepare('UPDATE salle SET `libelle`=:libelle WHERE `id`=:id');
			$updateSalle->execute(array( // Update dans la table Salle
				'libelle' => $libelle
			));
    	} catch (Exception $e) {
    		echo $e;
    	}
    }else{ // la salle n'existe pas => create
    	try {
    		if (NULL !== $bdd->lastInsertId()) {
	    		//$nextID = $id + 1;
	    		//print_r($bdd->lastInsertId($nextID)); die();
	    		$insertIntoSalle = $bdd->prepare('INSERT INTO salle(id, libelle) VALUES(:id, :libelle)');
				$insertIntoSalle->execute(array( // Insert dans la table evenement
					'id' => $bdd->lastInsertId() + 1,
					'libelle' => $libelle
				));
			} else {
				$insertIntoSalle = $bdd->prepare('INSERT INTO salle(id, libelle) VALUES(:id, :libelle)');
				$insertIntoSalle->execute(array( // Insert dans la table evenement
					'id' => $bdd->lastInsertId(),
					'libelle' => $libelle
				));
			}
    	} catch (Exception $e) {
    		echo $e;
    	}
	}
	
	// Redirection
	header('Location: ../modules/salle/crudSalle.php');

?>