<?php

	//	Connexion
	require_once('sqlConnect.php');


	$id = $_POST['id'];

	if($id != null){
		foreach($id as $lid){
			try{
				$deleteSalle = $bdd->prepare('DELETE from salle WHERE `id`=:id');
				$deleteSalle->execute(array(
					'id' => $lid
				));
			} catch(Exception $e){
				echo $e;
			}
		}
	} else {
		// Redirection
		header('Location: ../crudSalle.php');
	}

	// Redirection
	header('Location: ../crudSalle.php');

?>