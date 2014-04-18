<?php 
	include $_SERVER['DOCUMENT_ROOT'].'/BilletMaster/class/Evenement.class.php';
	include $_SERVER['DOCUMENT_ROOT'].'/BilletMaster/class/Ticket.class.php';

	// On récupère l'identifiant de l'événement choisi
	$valEvenement = isset($_POST['idEvenement']) ? $_POST['idEvenement'] : false;
	$evenement = $valEvenement;
?>
    <!-- liste des tickets -->
	<div id="listeTicket" name="listeTicket" data-group="<?php echo $evenement ?>"></div>

    <!-- bouton nouveau ticket avec fonction javascript affichage du formulaire -->
	<input type="button" name="ticketNew" id="ticketNew" value="Nouveau" class="btn btn-primary"/>
		

    <div id="ajouModifTicket">	
		<!-- formulaire ajout d'un ticket -->
		<div id="ajoutTicket">
			<?php 
				echo'

				<form action="" method="post" id="newTicket">
					<div class="newTicket">

						<h4>Nouveau Ticket</h4>

						<input type="text" name="evenementId" value="'.$evenement.'" hidden="true" id="evenementId" />

						<label for="numero">Numero* : </label>
						<input type="text" name="numero" id="numero" value="" /><br /><br />

						<label for="libelle">Libelle* : </label>
						<input type="text" name="libelle"  id="libelle" value="" /><br /><br />

						<label for="etat">Etat* : </label>
						<input type="text" name="etat" id="etat" value="" /><br /><br />

						<label for="dateValidation">Date Validation : </label>
						<input type="text" name="dateValidation" id="dateValidation" class="dateTime" value="'.date("d/m/Y H:i:s").'" /><br /><br />

						<label for="utilisateur">Utilisateur : </label>
						<input type="text" name="idUtilisateur" id="idUtilisateur" value="" /><br /><br />
					</div>
					<input type="submit" name="goNewTicket" id="goNewTicket" value="Valider" />
					
				</form>'; 
			?>
		</div>

		<!-- formulaire modif d'un ticket -->
		<div id="modifTicket"></div>
	</div>
	<script type="text/javascript" src="/BilletMaster/js/infosTickets.js"></script>