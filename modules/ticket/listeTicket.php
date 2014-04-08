<?php
	include '../../class/Evenement.class.php';
	include '../../class/Ticket.class.php';

	// On récupère l'identifiant de l'événement choisi
	$valEvenement = isset($_POST['idEvenement']) ? $_POST['idEvenement'] : false;
	$evenement = $valEvenement;
?>

<!-- affiche le block modifier ticket et cache le block ajouter -->


<!-- liste des tickets -->
<form id="infoListeTicket" action="" method="POST" onsubmit="javascript: return checkForm()">
	<table border id="tabTicket">
		<thead id="headTicket"> <!--en tete de la table -->
			<tr id="trdetailTicket">
				<th id="thselectTicekt"></th>
				<th id="thnumTicekt">Numéro</th>
				<th id="thlibelleTicket">Libellé</th>
				<th id="thetatTicket">Etat</th>
				<th id="thdateValidationTicket">Date Validation</th>
				<th id="thidUtilisateurTicket">idUtilisateur</th>
				<th id="thmodifTicket">Modifier</th>
				<th id="thdelTicket"> </th>
			</tr>
		</thead>
		<tbody id="bodyTicket"><!-- corps de la table -->
			<?php 
			$listeTickets = Ticket::getListeTickets($evenement);
			foreach($listeTickets as $unTicket) {
				echo '
						<tr id="trinfoTicket">
							<td id="tdselectTicket">
								<input type="checkbox" name="idTicket[]" id="idTicket'.$unTicket->id.'" value="'.$unTicket->id.'">
							</td>
							<td id="tdnumTicket">
								'.$unTicket->numero.'
							</td>
							<td id="tdlibelleticket">
								'.$unTicket->libelle.'
							</td>
							<td id="tdetatTicket">
								'.$unTicket->etat.'
							</td>
							<td id="tddateValidationTicket">
								'.date("d/m/Y H:i:s",$unTicket->dateValidation).'
							</td>
							<td id="tdidUtilisateurTicket">
								'.$unTicket->idUtilisateur.'
							</td>
							<td id="tdmodifTicket">
								<input type="button" name="'.$unTicket->id.'" data-role="ticketModif" value="Modifier" />
							</td>
							<td id="tddelTicket">
								<input type="button" name="'.$unTicket->id.'" data-role="ticketDel"  class="delTicket" />
							</td>
						</tr>';
							
			} ?>
		</tbody>
	</table>
	<input type="submit" name="goDelTickets" id="goDelTickets" value="Supprimer" /> <!-- bouton supprimer pour checkbox -->
</form>

<script>
$(document).ready(function(){

	//affiche le formulaire nouveau ticket au clique du bouton nouveau
	$('[data-role=ticketModif]').click(function(event){
		$("#ajoutTicket").slideUp();
		$('#modifTicket').slideDown();
		$('#ticketNew').slideDown();
	});

	//bouton modifie ticket
    $('[data-role=ticketModif]').click(function() {
    	var valTicket = $(this).prop('name'); //récupère le name de du ticket selectionner
  		if(valTicket != ''){ //verifie si le name est vide
  			$.ajax({ //appel de l'ajax
  				type: "POST", //envoie des infos en POST
  				url: "modifTicket.php", //envoi des infos a la page modifTicket.php
  				data: "idTicket="+valTicket, //transmet le paramatre idTicket récupérer par le nom
  				success: function(option){ // je récupère la réponse du fichier PHP
  					$('#modifTicket').html(option); //affiche le formulaire de modification de la div modif_Ticket
  				}
  			});
  		}
    });

	//bouton del ticket
    $('[data-role=ticketDel]').click(function() {
    	var valTicket = $(this).prop('name'); //récupère le name de du ticket selectionner
  		if(valTicket != ''){ //verifie si le name est vide
  			$.ajax({ //appel de l'ajax
  				type: "POST", //envoie des infos en POST
  				url: "delUnTicket.php", //envoi des infos a la page modifTicket.php
  				data: "idTicket="+valTicket, //transmet le paramatre idTicket récupérer par le nom
  				success: function(option){ // je récupère la réponse du fichier PHP
  					location.reload();
  				}
  			});
  		}
    });

    //bouton supprimer les tickets des checkbox

	$('#infoListeTicket').submit(function(event) {
        var idTicket = $('#idTicket').val(); // je récupère les valeurs des id des checkboxs

	        $.ajax({ // appel Ajax
	        	type: "POST", //envoie des infos en POST
	            url: "delLesTickets.php", //envoi des infos a la page modifTicket.php
	            data: $(this).serialize(), //transmet toutes les ids des checkboxs sélectionnés 
	            success: function(option) { // je récupère la réponse du fichier PHP
	            	location.reload();
	            }
	        });
	    	event.preventDefault();
	    	return false; // j'empêche le navigateur de soumettre lui-même le formulaire
        
        /*else{
        	if($('#messageErreur').is(":visible")){
        		$('#messageErreur').html("Sélectionné au moins un ticket!");
        	}
        	else{
        		$('#messageErreur').toggle();
        		$('#messageErreur').html("Sélectionné au moins un ticket!");
        	}
        	return false; // j'empêche le navigateur de soumettre lui-même le formulaire
        }*/

	});

});
</script>