<?php

	//	Connexion
	require_once '../../includes/sqlConnect.php';

    $tabData = json_decode($_POST['data']);


    if($tabData->idpSalle != '' && ($tabData->idpPeriode != '1' || $tabData->idpPeriode != '7' || $tabData->idpPeriode != '30')){
    	try {
    		$finPeriode = (($tabData->idpPeriode) +1);
    		$nbTicketValides = $bdd->prepare("SELECT count(t.id) as nb
    											FROM ticket as t, evenement as e, salle as s 
    											WHERE t.idEvenement=e.id 
    											AND s.id=e.idSalle 
    											AND s.id=:idSalle
    											AND t.etat = '1'
    											AND DATEDIFF(now(),t.dateValidation) >= 1
												AND DATEDIFF(now(),t.dateValidation) < :periode2");

			$nbTicketValides->execute(array( // Update dans la table salle
				'idSalle' => $tabData->idpSalle,
				'periode2'=> $finPeriode
			));

			$nbTicketTotal = $bdd->prepare("SELECT count(t.id) as nb 
											FROM ticket as t, evenement as e, salle as s 
											WHERE t.idEvenement=e.id 
											AND s.id=e.idSalle 
											AND s.id=:idSalle 
											AND DATEDIFF(now(),t.dateValidation) >= 1
											AND DATEDIFF(now(),t.dateValidation) < :periode2");
			$nbTicketTotal->execute(array( // Update dans la table salle
				'idSalle' => $tabData->idpSalle,
				'periode2'=> $finPeriode
			));

			$libelleSalle = $bdd->prepare("SELECT libelle FROM salle WHERE id=:idSalle");
			$libelleSalle->execute(array(
				'idSalle' => $tabData->idpSalle
			));

			$resValid = $nbTicketValides->fetch();
			$resTotal = $nbTicketTotal->fetch();
			$libelle = $libelleSalle->fetch();

			$resNonValid = $resTotal['nb']-$resValid['nb'];

			if($resTotal['nb']==0 && $tabData->idpPeriode == 1){
				echo("<p class='erreurDonnees'>Pas d'informations'disponibles pour la salle : ".$libelle['libelle']." concernant les données de hier</p>");
			} else {
				if($resTotal['nb']==0){
					echo("<p class='erreurDonnees'>Pas de donnees disponibles pour la salle : ".$libelle['libelle']." sur la periode concernant le(s) ".$tabData->idpPeriode." dernier(s) jour(s).</p>");
				}  else {
					echo("<h2>Salle : ".$libelle['libelle']."</h2>");
					echo("<h3>Nombre de ticket total  : ".$resTotal['nb']."</h3>");
					echo("<h3>Nombre de ticket valide : ".$resValid['nb']."</h3>");
					echo("<h3>Nombre de ticket non valide : ".$resNonValid."</h3>");
					echo("<img src='../../includes/jpgraph.php?resNon=".$resNonValid."&res=".$resValid['nb']."'></img>");	
				}
			}	
    	} catch (Exception $e) {
    		echo $e;
    	}
    }

?>