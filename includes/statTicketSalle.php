<?php

	//	Connexion
	require_once('sqlConnect.php');

	// recuperation du tableau de variable
    $tabData = json_decode($_POST['data']);

    // Verification des varibales
    if($tabData->idpSalle != '' && ($tabData->idpPeriode != '1' || $tabData->idpPeriode != '7' || $tabData->idpPeriode != '30')){
    	try {
    		$finPeriode = (($tabData->idpPeriode) +1); 
    		// Requete trouvant le nombre de ticket valides dans la periode
    		$nbTicketValides = $bdd->prepare("SELECT count(t.id) as nb
    											FROM ticket as t, evenement as e, salle as s 
    											WHERE t.idEvenement=e.id 
    											AND s.id=e.idSalle 
    											AND s.id=:idSalle
    											AND t.etat = '1'
    											AND DATEDIFF(now(),t.dateValidation) >= 1
												AND DATEDIFF(now(),t.dateValidation) < :periode2");

			$nbTicketValides->execute(array( // execution de la requete
				'idSalle' => $tabData->idpSalle,
				'periode2'=> $finPeriode
			));

			// recuperation du nombre de ticket total dans la periode
			$nbTicketTotal = $bdd->prepare("SELECT count(t.id) as nb 
											FROM ticket as t, evenement as e, salle as s 
											WHERE t.idEvenement=e.id 
											AND s.id=e.idSalle 
											AND s.id=:idSalle 
											AND DATEDIFF(now(),t.dateValidation) >= 1
											AND DATEDIFF(now(),t.dateValidation) < :periode2");
			$nbTicketTotal->execute(array( // execution de la requete
				'idSalle' => $tabData->idpSalle,
				'periode2'=> $finPeriode
			));

			// recuperation du libelle de la salle
			$libelleSalle = $bdd->prepare("SELECT libelle FROM salle WHERE id=:idSalle");
			$libelleSalle->execute(array(
				'idSalle' => $tabData->idpSalle
			));

			// execution des requetes
			$resValid = $nbTicketValides->fetch();
			$resTotal = $nbTicketTotal->fetch();
			$libelle = $libelleSalle->fetch();

			// calcule des ticket non valides
			$resNonValid = $resTotal['nb']-$resValid['nb'];

			// si le nombre total de ticket est = 0 et qu'on demande les données de hier
			if($resTotal['nb']==0 && $tabData->idpPeriode == 1){
				echo("<p class='erreurDonnees'>Pas d'informations'disponibles pour la salle : ".$libelle['libelle']." concernant les données de hier</p>");
			} else { // sinon
				if($resTotal['nb']==0){ // si nombre total de ticket est = 0
					echo("<p class='erreurDonnees'>Pas de donnees disponibles pour la salle : ".$libelle['libelle']." sur la periode concernant le(s) ".$tabData->idpPeriode." dernier(s) jour(s).</p>");
				}  else { // sinon
					echo("<h2>Salle : ".$libelle['libelle']."</h2>");
					echo("<h3>Nombre de ticket total  : ".$resTotal['nb']."</h3>");
					echo("<h3>Nombre de ticket valide : ".$resValid['nb']."</h3>");
					echo("<h3>Nombre de ticket non valide : ".$resNonValid."</h3>");

					// Jpgraph envoie des variables en get
					echo("<img src='includes/jpgraph.php?resNon=".$resNonValid."&res=".$resValid['nb']."'></img>");	
				}
			}	
    	} catch (Exception $e) {
    		echo $e;
    	}
    }

?>