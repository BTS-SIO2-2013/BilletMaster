<?php 
 if (!defined('BASE_URI')) define ('BASE_URI',''.$_SERVER['DOCUMENT_ROOT'].'/BilletMaster');
include BASE_URI.'/class/Evenement.class.php';
	  include BASE_URI.'/class/Ticket.class.php';

	// On récupère l'identifiant de l'événement choisi
	$valEvenement = isset($_POST['idEvenement']) ? $_POST['idEvenement'] : false;
	$evenement = $valEvenement;
?>


    <!-- bouton nouveau ticket avec fonction javascript affichage du formulaire -->
		<input type="button" name="ticketNew" id="ticketNew" value="Nouveau" />
		

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

    <!-- liste des tickets -->
		<div id="listeTicket"></div>
		

<script>
$(document).ready(function(){

	$('.dateTime').datetimepicker({
		lang:'fr',
		format:'d/m/Y H:i:s'
	});

	//affiche le formulaire nouveau ticket au clique du bouton nouveau
	$('#ticketNew').click(function(event){
		$("#ajoutTicket").slideDown();
		$('#modifTicket').slideUp();
		$('#ticketNew').slideUp();
	});

	//affiche la liste des tickets
	var evenement = '<?php echo $evenement; ?>' ;
	if(evenement != ''){
		$.ajax({
		  type: "POST",
	      url: "listeTicket.php",
	      dataType: "html",
	      data: "idEvenement="+evenement,
	      success: function(_html){
	         $('#listeTicket').html(_html);
	      }
   		});
  	}


    //bouton lajouter ticket
    $('#newTicket').submit(function(event) {
    	  // je récupère les valeurs
        var evenementId = $('#evenementId').val();
        var numero = $('#numero').val();
        var libelle = $('#libelle').val();
        var etat = $('#etat').val();
        var dateValidation = $('#dateValidation').val();
        var idUtilisateur = $('#idUtilisateur').val();

		    // je vérifie une première fois pour ne pas lancer la requête HTTP
        // si je sais que mon PHP renverra une erreur
        if(numero === '' || libelle === '' || etat === '') {
        	if($('#messageErreur').is(":visible")){
        		$('#messageErreur').html("Veuillez remplir tous les champs obligatoires !");
        	}
        	else{
        		$('#messageErreur').toggle();
        		$('#messageErreur').html("Veuillez remplir tous les champs obligatoires !");
        	}
        } else {
            // appel Ajax
            $.ajax({
                url: "newTicket.php", // le nom du fichier indiqué dans le formulaire
                type: "POST", // la méthode indiquée dans le formulaire (get ou post)
                data: $(this).serialize(), // je sérialise les données (voir plus loin), ici les $_POST
                success: function() { // je récupère la réponse du fichier PHP
					location.reload();
                }

            });
    	}
    	event.preventDefault();
    	return false; // j'empêche le navigateur de soumettre lui-même le formulaire
	  });

});
</script>