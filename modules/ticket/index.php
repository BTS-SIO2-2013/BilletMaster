<?php
	$title = "Gestionnaire des tickets"; //titre de la page
	include $_SERVER['DOCUMENT_ROOT'].'/BilletMaster/header.php'; //	Fichier entête
	include $_SERVER['DOCUMENT_ROOT'].'/BilletMaster/class/Ticket.class.php';
	include $_SERVER['DOCUMENT_ROOT'].'/BilletMaster/class/Evenement.class.php';

?>
<h1>Gestionnaire des tickets</h1>


<!-- message d'erreur -->
<div id="messageErreur" style="display: none;background: #6B6B6B;width: 300px;text-align: center;border: 1px solid #fff;color: rgb(255, 245, 0);font-weight: bold;"></div>

<!-- liste des evenements -->
<div class="listeEvenements">
	<select id="listeEvenement" name="evenement" class="form-control">
		<option value="defaut" >-- Choisissez un événement --</option>
		<?php 
			$listeEvenements = Evenement::getListeEvenementsTickets();
			foreach($listeEvenements as $unEvenement) {
				echo '<option name="'.$unEvenement->id.'" id="'.$unEvenement->id.'" value="'.$unEvenement->id.'" data-role="evenement">'.$unEvenement->libelle.'</option>';
			}
		?>
	</select>
</div>

<!-- infos tickets -->
<div id="afficheTicket">

	<!-- liste des tickets -->
	<div id="listeTickets" class="col-md-12">

	</div>
	
</div>

<?php include $_SERVER['DOCUMENT_ROOT'].'/BilletMaster/footer.php'; ?>
