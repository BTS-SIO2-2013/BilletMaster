<?php
	$title = "Gestionnaire des tickets"; //titre de la page
    if (!defined('BASE_URI')) define ('BASE_URI',''.$_SERVER['DOCUMENT_ROOT'].'/BilletMaster');
	include BASE_URI.'/header.php'; //	Fichier entête
	include BASE_URI.'/class/Ticket.class.php';
	include BASE_URI.'/class/Evenement.class.php';
?>


<h1>Gestionnaire des tickets</h1>


<!-- message d'erreur -->
<div id="messageErreur" style="display: none;background: #6B6B6B;width: 300px;text-align: center;border: 1px solid #fff;color: rgb(255, 245, 0);font-weight: bold;"></div>

<!-- liste des evenements -->
<div class="listeEvenements">
	<select id="listeEvenement" name="evenement" onchange="javascript:selectEven();">
		<option value="defaut" >-- Choisissez un événement --</option>
		<?php 
			$listeEvenements = Evenement::getListeEvenementsTickets();
			foreach($listeEvenements as $unEvenement) {
				echo '<option name="'.$unEvenement->id.'" id="'.$unEvenement->id.'" value="'.$unEvenement->id.'" >'.$unEvenement->libelle.'</option>';
			}
		?>
	</select>
</div>

<!-- infos tickets -->
<div id="afficheTicket">

	<!-- liste des tickets -->
	<div id="listeTickets">

	</div>
	
</div>
<script>

$(document).ready(function(){
	$('.dateTime').datetimepicker({
		lang:'fr'
	});

	//masque les formulaires au choix d'un évenement
	$('#listeEvenement').change(function(event){
		$('#ajoutTicket').slideUp();
		$('#modifTicket').slideUp();
	});

  	$('#listeEvenement').change(function() { //récupère la liste en fonction de la liste déroulante
    	var valEvenement = $(this).val(); //récupération de value de l'option
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

<?php include BASE_URI.'/footer.php'; ?>