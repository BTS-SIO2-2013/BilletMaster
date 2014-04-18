<?php
	include $_SERVER['DOCUMENT_ROOT'].'/BilletMaster/class/Evenement.class.php';
	include $_SERVER['DOCUMENT_ROOT'].'/BilletMaster/class/Ticket.class.php';

	// On récupère l'identifiant de l'événement choisi
	$valEvenement = isset($_POST['idEvenement']) ? $_POST['idEvenement'] : false;
	$evenement = $valEvenement;
?>

<!-- affiche le block modifier ticket et cache le block ajouter -->


<!-- liste des tickets -->
<form id="infoListeTicket" action="" method="POST" onsubmit="javascript: return checkForm()">
	<div class="table-responsive">
		<table class="table table-striped">
			<thead id="headTicket"> <!--en tete de la table -->
				<tr id="trdetailTicket">
					<th id="thselectTicekt"></th>
					<th id="thnumTicekt">Numéro</th>
					<th id="thlibelleTicket">Libellé</th>
					<th id="thetatTicket">Etat</th>
					<th id="thdateValidationTicket">Date Validation</th>
					<th id="thidUtilisateurTicket">idUtilisateur</th>
					<th id="thQRCode">Voir QR Code</th>
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
								<td id="tdQRCode">
									<input type="button" class="btn btn-primary" data-role="QRCodeGenerator" data-toggle="modal" data-target="[data-role=QRModal]" value="QR Code"/>
								</td>
								<td id="tdmodifTicket">
									<input type="button" name="'.$unTicket->id.'" data-role="ticketModif" value="Modifier" class="btn btn-primary"/>
								</td>
								<td id="tddelTicket">
									<input type="button" name="'.$unTicket->id.'" data-role="ticketDel"  class="delTicket" />
								</td>
							</tr>';
								
				} ?>
			</tbody>
		</table>
	</div>
	<input type="submit" name="goDelTickets" id="goDelTickets" value="Supprimer" class="btn btn-danger"/> <!-- bouton supprimer pour checkbox -->
</form>

<?php include $_SERVER['DOCUMENT_ROOT'].'/BilletMaster/modules/ticket/modalTicket.php';?>


<script type="text/javascript" src="/BilletMaster/js/listeTicket.js"></script>