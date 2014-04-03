<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
		<title>Gestionnaire des evenements</title>
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
		<script type="text/javascript">
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
				var dateDebutEvenement = $('#dateDebutEvenement Input').val();
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
				
			return valid;
			});
		});
		</script>
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
					<form action="includes/cuEmploye.php" method="post" id="formCU">
						<div id="idPersonne">
							<input type="text" name="idPersonne" value="" id="idInput" hidden="true"/>
						</div>
						<div id="dateDebutVente">
							<h6>DateDebutVente</h6>
							<input type="text" name="dateDebutVente" value="" id="dateDebutVenteInput" />
						</div>		
						<div class="message-erreur"></div>
						<div id="dateFinVente">
							<h6>dateFinVente</h6>
							<input type="text" name="dateFinVente" value="" id="dateFinVenteInput" >
						</div>
						<div class="message-erreur"></div>
						<div id="dateDebutEvenment">
							<h6>dateDebutEvenement</h6>
							<input type="text" name="dateDebutEvenement" value="" id="dateDebutEvenementInput">
						</div>
						<div class="message-erreur"></div>
						<div id="dateFinEvenement">
							<h6>dateFinEvenement</h6>
							<input type="dateFinEvenement" name="dateFinEvenement" value="" id="dateFinEvenementInput">
						</div>
						<div class="message-erreur"></div>
						<div id="libelle">
							<h6>Libelle de l'evenement</h6>
							<input type="text" name="libelle" value="" id="libelleInput" >
						</div>
						<div class="message-erreur"></div>
						<div id="btnCreer">
							<input type="submit" value="Enregistrer" id="btnCU" />
						</div>
					</form>
					<div id="basCorps">
						<div id="btnRetour">
	                        <a href="index.php">Retour</a>
	                    </div>
	                </div>
				</div>
			</div>
		</div>	
	</body>
</html>