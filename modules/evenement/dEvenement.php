<?php
	//	Connexion
	require_once '../../includes/sqlConnect.php';

	$id = $_POST['id'];

	if($id != null){
		foreach($id as $lid){
			try{
				$deleteEvenement = $bdd->prepare('DELETE from evenement WHERE `id`=:id');
				$deleteEvenement->execute(array(
					'id' => $lid
				));
			} catch(Exception $e){
				echo $e;
			}
		}
	} else {
		// Redirection
		header('Location: crudEvenement.php');
	}
	// Redirection
	header('Location: crudEvenement.php');
?>