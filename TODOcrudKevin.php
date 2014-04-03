<?php
	$title = "Liste des tickets";
    //	Fichier entête
	include '../../header.php';
	include '../../class/Evenement.class.php';
	include '../../js/timepicker.js';
?>


<h1>Liste des évènements</h1>


<script type="text/javascript">
	function ajoutTicket(){ document.getElementById('ajout_Ticket').style.display="block"; document.getElementById('modif_Ticket').style.display="none";}
	function modifTicket(){ document.getElementById('modif_Ticket').style.display="block"; document.getElementById('ajout_Ticket').style.display="none";}
</script>


<!-- Infos évènements -->
<div id="afficheEvt">
	<input type="button" name="evt_new" id="evt_new" value="Nouveau" onclick="javascript:ajoutEvt();" />
	<div id="ajou_modif_Evt">

		<!-- formulaire ajout d'un ticket -->
		<div id="ajout_Evt">
			<?php 
				$creerEvt = Evenement::createEvt();
				echo'

				<form action="" method="post">
					<div class="new_evt">

						<h4>Nouvel évènement</h4>

						<label for="dateDebutVente">Date de début vente : </label>
						<input type="text" name="dateDebutVente" id="dateDebutVente" value="" class="dateTime" /><br /><br />

						<label for="dateFinVente">Date de fin vente : </label>
						<input type="text" name="dateFinVente"  id="dateFinVente" value="" class="dateTime" /><br /><br />

						<label for="dateDebutEvt">Date début évènement : </label>
						<input type="text" name="dateDebutEvt" id="dateDebutEvt" value="" class="dateTime" /><br /><br />

						<label for="dateFinEvt">Date fin évènement : </label>
						<input type="text" name="dateFinEvt" id="dateFinEvt" value="" class="dateTime" /><br /><br />

						<label for="libelle">Libelle : </label>
						<input type="text" name="libelle" id="libelle" value="" /><br /><br />
					</div>
					<input type="submit" name="go_new_evt" id="go_new_evt" value="Valider" />
					
				</form>'; ?>
		</div>

				<!-- formulaire modif d'un ticket -->
		<div id="modif_Ticket">
			<?php 
				
				$idTicket = 1;
				Ticket::getModifTicket($idTicket);
				$leTicket = Ticket::getUnTicket($idTicket);
				echo'

				<form action="" method="post">
					<div class="new_ticket">

						<h4>Modifier le ticket ID '.$leTicket->id.'</h4>

						<label for="numero">Numero : </label>
						<input type="text" name="numero" id="numero" value="'.$leTicket->numero.'" /><br /><br />

						<label for="libelle">Libelle : </label>
						<input type="text" name="libelle"  id="libelle" value="'.$leTicket->libelle.'" /><br /><br />

						<label for="etat">Etat : </label>
						<input type="text" name="etat" id="etat" value="'.$leTicket->etat.'" /><br /><br />

						<label for="utilisateur">Utilisateur : </label>
						<input type="text" name="idUtilisateur" id="idUtilisateur" value="'.$leTicket->idUtilisateur.'" /><br /><br />
					</div>
					<input type="submit" name="go_modif_ticket" id="go_modif_ticket_valid" value="Valider" />
					
				</form>'
			; ?>
		</div>
	</div>


	<!-- liste des tickets -->
	<div id="listeTickets">

	</div>



	
</div>
<script>
$(document).ready(function(){
          	$('#listeEvenement').change(function() {
            	var valEvenement = $(this).val();
          		if(valEvenement != ''){
          			$.ajax({
          				type: "POST",
          				url: "infosTickets.php",
          				data: "idEvenement="+valEvenement,
          				success: function(option){
          					$('#listeTickets').html(option);
          				}
          			});
          		}
            });
});


</script>

<?php include $_SERVER['DOCUMENT_ROOT'].'/footer.php'; ?>