<?php
	require_once('class/Salle.class.php');
	require_once('class/Evenement.class.php');
	//	Pas d'accès direct
    require_once('includes/confirmConnexion.php');
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
		<title>Statistique</title>
		<link rel="stylesheet" type="text/css" href="css/global.css" />
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
		<script type="text/javascript" src="js/verifsForm.js"></script>
	</head>
	<body>
		<div id="corps">
	        <div id="hautCorps">
	        	<div id="btnRetour">
	                    <a class="btn-retour"href="index.php">Retour</a>
	            </div>
	        </div>
			<div id="milieuCorps">
				<div id="filtre">
					<legend>Filtre</legend>
					</br></br></br><input class="choixFiltre evt" type="radio" name="choix" value="evenement">Par Evenements</br>
					<?php
						$listeEvenements = Evenement::getListeEvenements();
						$comboEvent = Evenement::affichageComboBox($listeEvenements);
						print($comboEvent);
					?>
					</br></br>
					<input class="choixFiltre salle" type="radio" name="choix" value="salle">Par Salles</br>
					<?php 	
						$listeSalles = Salle::getListeSalles();
						$combo = Salle::affichageComboBox($listeSalles);
						print($combo);
					?>
					</br>
					<h5>Choisissez une periode</h5>
					<select class="filter" id="lstPeriode">
						<option value='null'>Choix periode</option>
						<option value='1'>Hier</option>
						<option value='7'>Les 7 derniers jours</option>
						<option value='30'>Les 30 derniers jours</option>
					</select>
					</br></br></br>
					<button id="btnGenererStat" class='genererStats filter' >Generer Statistiquesr</button>
				</div>
				<div id="statsAjax"></div>
			</div>
			<div id="basCorps">
	        </div>
		</div>
		<script type="text/javascript">
			$(function(){
				$("select").prop('disabled', true);
				$("#btnGenererStat").prop('disabled',true);
				$(".choixFiltre").change(function(){
					$('#btnGenererStat').prop('disabled',false);
					if($(".choixFiltre.evt").prop('checked') == true){
						$('#lstSalle').prop('selectedIndex', 0);
						$('#lstPeriode').prop('selectedIndex', 0);
						$('#lstEvent').prop('disabled',false);
					} else {
						$('#lstEvent').prop('disabled', true);
					}
					if($(".choixFiltre.salle").prop('checked') == true){
						$('#lstEvent').prop('selectedIndex', 0);
						$('#lstSalle').prop('disabled', false);
						$('#lstPeriode').prop('disabled', false);
					} else {
						$('#lstSalle').prop('disabled', true);
						$('#lstPeriode').prop('disabled', true);
					}
				});

				$("#statsAjax").hide();
                $(".genererStats").click(function(){
					var idp = $('#lstEvent option:selected').val();
					var idpSalle = $('#lstSalle option:selected').val();
					var idpPeriode = $('#lstPeriode option:selected').val();

					$('#statsAjax').show();
					if((idp == 'null')||(idpPeriode=='null' && idpSalle=='null')||(idpPeriode=='null' && idpSalle=='null' && idp == 'null')){
						$('#statsAjax').html(" !! Attention aucun Filtre selectionne !!").css("color", "red").css("text-align", "center");	
					}
					if(idp != 'null' && idpSalle == 'null' && idpPeriode == 'null'){
						$.ajax({
							type: "POST",
							url: "includes/statTicket.php",
							data: "idp="+ idp,
							success: 
							function(option){
								$('#statsAjax').html(option).css("color", "black");
							}
						});
					}else{
						if(idp == 'null' && idpSalle != 'null' && idpPeriode != 'null'){
							$.ajax({
								type: "POST",
								url: "includes/statTicketSalle.php",
								data: 'data={"idpSalle":"' + idpSalle+ '","idpPeriode":"' + idpPeriode+ '"}',
								success: 
								function(option){
									$('#statsAjax').html(option).css("color", "black");
								}
							});
						}else{
							$("statsAjax").html("Erreur requete");
						}
					}
					return false;
				});
            });
        </script>
	</body>
</html>
