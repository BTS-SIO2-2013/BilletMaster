<?php
 	include '../../class/Evenement.class.php';
	include '../../class/Ticket.class.php';

	// On récupère l'identifiant de l'événement choisi
	$valTicket = isset($_POST['idTicket']) ? $_POST['idTicket'] : false;
	$idTicket = $valTicket;


	$leTicket = Ticket::getUnTicket($idTicket);
	echo'

	<form action="" method="post" id="ticketModif">
		<div class="modifTicket">

			<h4>Modifier le ticket ID '.$leTicket->id.'</h4>

			<input type="text" name="idTicket" id="idTicket" value="'.$leTicket->id.'" hidden="true" />

			<label for="numero">Numero : </label>
			<input type="text" name="numero" id="numero" value="'.$leTicket->numero.'" /><br /><br />

			<label for="libelle">Libelle : </label>
			<input type="text" name="libelle"  id="libelle" value="'.$leTicket->libelle.'" /><br /><br />

			<label for="etat">Etat : </label>
			<input type="text" name="etat" id="etat" value="'.$leTicket->etat.'" /><br /><br />

			<label for="etat">Date Validation : </label>
			<input type="text" name="dateValidation" id="dateValidation" class="dateTime" value="'.date("d/m/Y H:i:s",$leTicket->dateValidation).'" /><br /><br />

			<label for="utilisateur">Utilisateur : </label>
			<input type="text" name="idUtilisateur" id="idUtilisateur" value="'.$leTicket->idUtilisateur.'" /><br /><br />
		</div>
		<input type="submit" name="goModifTicket" id="goModifTicket" value="Valider" />
		
	</form>';
?>
 
<script>
$(document).ready(function() { //attend le chargement de la page pour executer le script

	$('.dateTime').datetimepicker({
		lang: 'fr',
		format:'d/m/Y H:i:s'
	});

	$('#ticketModif').submit(function(event) {
    	// je récupère les valeurs
    	var id = $('#idTicket').val();
        var numero = $('#numero').val();
        var libelle = $('#libelle').val();
        var etat = $('#etat').val();
        var dateValidation = $('#dateValidation').val();
        var idUtilisateur = $('#idUtilisateur').val();

		// je vérifie une première fois pour ne pas lancer la requête HTTP
        // si je sais que mon PHP renverra une erreur
            // appel Ajax
            $.ajax({
                url: "modifLeTicket.php", // le nom du fichier indiqué dans le formulaire
                type: "POST", // la méthode indiquée dans le formulaire (get ou post)
                data: $(this).serialize(), // je sérialise les données (voir plus loin), ici les $_POST
                success: function(option) { // je récupère la réponse du fichier PHP
                	location.reload();
                }
            });
    	event.preventDefault();
    	return false; // j'empêche le navigateur de soumettre lui-même le formulaire
	});
}); 
</script>