<?php

	//	Connexion
	require_once '../../includes/sqlConnect.php';

	//  On récupère l'identifiant de l'évènement
    $idEvent = isset($_POST['idp']) ? $_POST['idp'] : false;

    // Si id different de null
    if($idEvent!=null){
    	try {
    		$nbTicketValides = $bdd->prepare("SELECT count(t.id) as nb FROM ticket as t, evenement as e WHERE t.idEvenement=e.id AND t.etat = '1' AND e.id=:idEvenement");
			$nbTicketValides->execute(array( // select du nombre de ticket valides
				'idEvenement' => $idEvent
			));

			$nbTicketTotal = $bdd->prepare("SELECT count(t.id) as nb FROM ticket as t, evenement as e WHERE t.idEvenement=e.id AND e.id=:idEvenement");
			$nbTicketTotal->execute(array( // select nombre ticket total
				'idEvenement' => $idEvent
			));

			$libelleEvent = $bdd->prepare("SELECT libelle FROM evenement WHERE id=:idEvenement");
			$libelleEvent->execute(array( // select libelle de l'evenement
				'idEvenement' => $idEvent
			));

			// execution des requetes stockes
			$resValid = $nbTicketValides->fetch();
			$resTotal = $nbTicketTotal->fetch();
			$libelle = $libelleEvent->fetch();

			$resNonValid = $resTotal['nb']-$resValid['nb']; // calcul du nombre de ticket non valide

			if($resTotal['nb']==0){ // Si nombre de ticket total = 0
				echo("<p class='erreurDonnees'>Pas d'informations'disponibles pour l'evenement : ".$libelle['libelle']."</p>");
			} else { // sinon
				echo("<h2>Evenement : ".$libelle['libelle']."</h2>");
				echo("<h3>Nombre de ticket total  : ".$resTotal['nb']."</h3>");
				echo("<h3>Nombre de ticket valide : ".$resValid['nb']."</h3>");
				echo("<h3>Nombre de ticket non valide : ".$resNonValid."</h3>");
				// Jpgraph avec envoie de variables en get
				echo("<img src='../../includes/jpgraph.php?resNon=".$resNonValid."&res=".$resValid['nb']."'></img>");
			}
    	} catch (Exception $e) {
    		echo $e;
    	}
    }

?>