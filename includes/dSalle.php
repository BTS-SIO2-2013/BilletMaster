<?php


	//********************
	// TODO : voir comment gerer la suppression dans le cas ou un evenement est attache a une salle lors de la supression
	// Mettre idSalle dans evenement nullable peut etre ??
	// Supprimer l'evenement avant ??
	// A voir....
	//*********************

	//	Connexion
	require_once('sqlConnect.php');


	$id = $_POST['id'];

	// Si tableau different null
	if($id != null){
		foreach($id as $lid){
			try{
				$deleteSalle = $bdd->prepare('DELETE from salle WHERE `id`=:id');
				$deleteSalle->execute(array( // delete dans la table salle
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