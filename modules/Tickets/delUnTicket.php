<?php
 if (!defined('BASE_URI')) define ('BASE_URI',''.$_SERVER['DOCUMENT_ROOT'].'/BilletMaster');
	//	Connexion
	include BASE_URI.'/includes/sqlConnect.php';

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