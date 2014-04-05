<?php
	require_once('class/Evenement.class.php');
	require_once('class/Salle.class.php');
	//	Pas d'accès direct
    require_once('includes/confirmConnexion.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
		<title>Gestionnaire des evenements</title>
		<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css" />
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
		<script src="js/jquery.datetimepicker.js"></script>
		<!--<script type="text/javascript">
		$(function(){
			$("#btnCU").click(function() {
				valid = true;
				var dateDebutVente = $('#dateDebutVenteInput').val();
				if (dateDebutVente == "") {
					$('#dateDebutVenteInput').css("border-color","#FF0000");
					$('#dateDebutVente').next(".message-erreur").fadeIn().text("Veuillez entrer une date de début de vente");
					valid = false;
				}
				var dateFinVente = $('#dateFinVenteInput').val();
				if (dateFinVente == "") {
					$('#dateFinVenteInput').css("border-color","#FF0000");
					$('#dateFinVente').next(".message-erreur").fadeIn().text("Veuillez entrer une date de fin de vente");
					valid = false;
				}
				var dateDebutEvenement = $('#dateDebutEvenementInput').val();
				if (dateDebutEvenement  == "") {
					$('#dateDebutEvenement Input').css("border-color","#FF0000");
					$('#dateDebutEvenement ').next(".message-erreur").fadeIn().text("Veuillez entrer une date de début de l'évenement");
					valid = false;
				}
				var dateFinEvenement = $('#dateFinEvenementInput').val();
				if (dateFinEvenement == "") {
					$('#dateFinEvenementInput').css("border-color","#FF0000");
					$('#dateFinEvenement').next(".message-erreur").fadeIn().text("Veuillez entrer une date de fin de l'evenement");
					valid = false;
				}
				var libelle = $('#libelleInput').val();
				if ((!(libelle.indexOf("@")>=0))||(!(libelle.indexOf(".")>=0))) {
					$('#libelleInput').css("border-color","#FF0000");
					$('#libelle').next(".message-erreur").fadeIn().text("Veuillez entrer un libelle de l'evenement");
					valid = false;
				}
				var salle = $('#salleInput').val();
				if (salle == "Choisir une salle") {
					$('#salleInput').css("border-color","#FF0000");
					$('#salle').next(".message-erreur").fadeIn().text("Veuillez choisir une salle pour l'evenement");
					valid = false;
				}
				
			return valid;
			});
		});
		</script>-->
	</head>
	<body>
		<div id="bg">
			<div id="hautPage">
	            <div id="titre">
	                <h1>Liste des Evenements</h1>
	            </div>
            </div>
			<div id="corps">
                <div id="hautCorps">
                </div>
				<div id="milieuCorps">
					<div id="modifEvenement"></div>
					<form action="includes/cuEvenement.php" method="post" id="formCU">
						<div id="idEvenement">
							<input type="text" name="idEvenement" value="" id="idEvenement" hidden="true"/>
						</div>
						<div id="dateDebutVente">
							<h6>DateDebutVente</h6>
							<input type="text" name="dateDebutVente" value="" id="dateDebutVenteInput" class="dateTime" />
						</div>		
						<div class="message-erreur"></div>
						<div id="dateFinVente">
							<h6>dateFinVente</h6>
							<input type="text" name="dateFinVente" value="" id="dateFinVenteInput" class="dateTime" />
						</div>
						<div class="message-erreur"></div>
						<div id="dateDebutEvenment">
							<h6>dateDebutEvenement</h6>
							<input type="text" name="dateDebutEvenement" value="" id="dateDebutEvenementInput" class="dateTime" />
						</div>
						<div class="message-erreur"></div>
						<div id="dateFinEvenement">
							<h6>dateFinEvenement</h6>
							<input type="dateFinEvenement" name="dateFinEvenement" value="" id="dateFinEvenementInput" class="dateTime" />
						</div>
						<div class="message-erreur"></div>
						<div id="libelle">
							<h6>Libelle de l'evenement</h6>
							<input type="text" name="libelle" value="" id="libelleInput" />
						</div>
						<div class="message-erreur"></div>
						<div id="salle">
							<h6>Salle</h6>
							<?php
								$listeSalles = Salle::getListeSalles();
								$combo = Salle::affichageComboBox($listeSalles);
								print($combo);
							?>
						</div>
						<div class="message-erreur"></div>
						<div id="btnCreer">
							<input type="submit" value="Enregistrer" id="btnCU" />
						</div>
					</form>
					<form action="includes/dEvenement.php" method="POST">
					<?php
						$listeDesEvenements = Evenement::getListeEvenements();
						$tab = Evenement::affichageEvenements($listeDesEvenements);
						print($tab);
					?>
					<input type="submit" value="Supprimer" id="btnS" />
					</form>
					<div id="basCorps">
						<div id="btnRetour">
	                        <a href="index.php">Retour</a>
	                    </div>
	                </div>
				</div>
			</div>
		</div>

		<script type="text/javascript">
			$(function(){
				
				$('.dateTime').datetimepicker({ 
					format:'d/m/Y H:i',
					lang:'fr'
				});

				$('[data-role=evenementModif]').click(function() {
			    	var valEvenement = $(this).prop('name');
			  		if(valEvenement != ''){
			  			$.ajax({
			  				type: "POST",
			  				url: "modifEvenement.php",
			  				data: "idEvenement="+valEvenement,
			  				success: function(option){
			  					$('#modifEvenement').html(option);
			  				}
			  			});
			  		}
				});

			});
		</script>

	</body>
</html>