<?php

	//	Connexion
	require_once('sqlConnect.php');

	//  On récupère l'identifiant de l'évènement
    $idEvent = isset($_POST['idp']) ? $_POST['idp'] : false;

    if($idEvent!=null){
    	try {
    		$nbTicketValidés = $bdd->prepare("SELECT count(t.id) as nb FROM ticket as t, evenement as e WHERE t.idEvenement=e.id AND t.etat = '1' AND e.id=:idEvenement");
			$nbTicketValidés->execute(array(
				'idEvenement' => $idEvent
			));

			$nbTicketTotal = $bdd->prepare("SELECT count(t.id) as nb FROM ticket as t, evenement as e WHERE t.idEvenement=e.id AND e.id=:idEvenement");
			$nbTicketTotal->execute(array( 
				'idEvenement' => $idEvent
			));

			$libelleEvent = $bdd->prepare("SELECT libelle FROM evenement WHERE id=:idEvenement");
			$libelleEvent->execute(array(
				'idEvenement' => $idEvent
			));

			$resValid = $nbTicketValidés->fetch();
			$resTotal = $nbTicketTotal->fetch();
			$libelle = $libelleEvent->fetch();

			$resNonValid = $resTotal['nb']-$resValid['nb'];

			if($resTotal['nb']==0){
				echo("<p class='erreurDonnees'>Pas d'informations'disponibles pour l'evenement : ".$libelle['libelle']."</p>");
			} else {
				echo("<h2>Evenement : ".$libelle['libelle']."</h2>");
				echo("<h3>Nombre de ticket total  : ".$resTotal['nb']."</h3>");
				echo("<h3>Nombre de ticket valide : ".$resValid['nb']."</h3>");
				echo("<h3>Nombre de ticket non valide : ".$resNonValid."</h3>");

				echo("<img src='includes/jpgraph.php?resNon=".$resNonValid."&res=".$resValid['nb']."'></img>");
			}
    	} catch (Exception $e) {
    		echo $e;
    	}
    }

?>