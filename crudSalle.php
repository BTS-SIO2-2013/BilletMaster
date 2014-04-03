<?php
	require_once('class/Salle.class.php');
	//	Pas d'accès direct
    require_once('includes/confirmConnexion.php');
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
		<title>Création d'une salle</title>
		<link rel="stylesheet" type="text/css" href="css/global.css" />
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
		<script type="text/javascript" src="js/verifsForm.js"></script>
	</head>
	<body>
		<div id="corps">
	        <div id="hautCorps"></div>
			<div id="milieuCorps">
				<form action="includes/cuSalle.php" method="post" id="formCU">
					<div id="idSalle">
						<input type="text" name="idSalle" value="" id="idInput" hidden="true"/>
					</div>
					<div id="libelle">
						<h6>libelle</h6>
						<input type="text" name="libelle" value="" id="libelleInput" />
					</div>		
					<div class="message-erreur"></div>
					<div id="btnCreer">
						<input type="submit" value="Enregistrer" id="btnCU" />
					</div>
				</form>
				<form action="includes/dSalle.php" method="post" id="formD">
					<?php
						$listeSalles = Salle::getListeSalles();
						$tab = Salle::affichageSalle($listeSalles);
						print($tab);
					?>
					<div id="btnSupprimer">
						<input type="submit" value="Supprimer" id="btnD" />
					</div>
				</form>
				<div id="basCorps">
					<div id="btnRetour">
	                    <a href="index.php">Retour</a>
	                </div>
	            </div>
			</div>
		</div>
	</body>
</html>