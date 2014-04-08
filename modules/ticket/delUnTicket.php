<?php
	//	Connexion
	include '../../includes/sqlConnect.php';

	$id = $_POST['idTicket'];

	if($id != null){
		try{
			$deleteTicket = $bdd->prepare('DELETE from ticket WHERE  id = "'.$id.'"');
			$deleteTicket->execute();
		} 
		catch(Exception $e){
			echo $e;
		}
	}
	
?>