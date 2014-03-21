<?php

	session_start();

	//	Erreur de connexion ?
	if (isset($_SESSION['erreurMail']))
		$erreur = $_SESSION['erreurMail'];
	else
		$erreur = "";	

	//	Fichier entête
	include('header_non_auth.php');
?>
	<div id="formMdp">
		<?php if (isset($_SESSION['erreurMail'])){echo "<div class='erreurAdresseMail'><p>".$erreur."</p></div>";} ?>
		<form method="POST" action="includes/oublieMdp.php">
			<h2>Mot de Passe oublié ?</h2>
			<input type="text" name="adresseMail" class="text-field2" placeholder="Votre adresse Mail" />
			<input type="submit" value="Envoyer" class="button" /><br />
		</form>
	</div>
<?php include('footer.php'); ?>