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
									'.$unTicket->code.'
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
									<input type="button" name="'.$unTicket->id.'" class="btn btn-primary" data-role="QRCodeGenerator" data-toggle="modal" data-target="#'.$unTicket->code.'" value="QR Code"/>
								</td>
								<td id="tdmodifTicket">
									<input type="button" name="'.$unTicket->id.'" data-role="ticketModif" value="Modifier" class="btn btn-primary"/>
								</td>
								<td id="tddelTicket">
									<input type="button" name="'.$unTicket->id.'" data-role="ticketDel"  class="delTicket" />
								</td>
							</tr>
							<!-- Fenetre pop-up, ou modal voir sur http://getbootstrap.com/javascript/#modals pour la doc -->
							<div class="modal fade" id="'.$unTicket->code.'" tabindex="-1" role="dialog" aria-labelledby="QRCodeLabel" aria-hidden="true">
							    <div class="modal-dialog modal-sm">
							        <div class="modal-content">
							            <div class="modal-header">
							                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							                    &times;
							                </button>
							                <h4 class="modal-title" id="QRCodeLabel">QR Code</h4>
							            </div>
							            <div class="modal-body" id="QRCodeModalBody">
							           		<img src="/BilletMaster/modules/ticket/QRCodeTicket.php?numTicket='.$unTicket->code.'" alt="QRCode/>
							            </div>
							        </div>
							    </div>
							</div>';
								
				} ?>
			</tbody>
		</table>
	</div>
	<input type="submit" name="goDelTickets" id="goDelTickets" value="Supprimer" class="btn btn-primary"/> <!-- bouton supprimer pour checkbox -->
</form>


<script type="text/javascript" src="/BilletMaster/js/listeTicket.js"></script>