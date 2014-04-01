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
				var libelle = $('#libelleInput').val();
				if ((libelle == "")) {
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
	                <h1>Liste des Salles</h1>
	            </div>
	            <div id="profil">
	                <button type="button">Profil</button>
	                <button type="button">Deconnexion</button>
	            </div>
				<div id="filAriane">
                </div>
            </div>
			<div id="corps">
                <div id="hautCorps">
                </div>
				<div id="milieuCorps">
					<form action="../../includes/cuSalle.php" method="post" id="formCU">
						<div id="idSalle">
							<input type="text" name="idSalle" value="" id="idInput" hidden="true"/>
						</div>
						<div id="libelle">
							<h6>Libelle de la salle</h6>
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