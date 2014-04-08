<?php
	//	Connexion
	include '../../includes/sqlConnect.php';

	$id = $_POST['idTicket'];

	if($id != null){
		foreach($id as $lid){
			try{
				$deleteTickets = $bdd->prepare('DELETE from ticket WHERE  id = :id');
				$deleteTickets->execute(array(
					'id' => $lid
				));
			} catch(Exception $e){
				echo $e;
			}
		}
	}
?>