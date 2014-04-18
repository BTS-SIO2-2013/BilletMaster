<?php 
	session_start();
	
	//	Erreur de connexion ?
	if (isset($_SESSION['erreur']))
		$erreur = $_SESSION['erreur'];
	else
		$erreur = "";

	//	Fichier entête
	include '../../header_non_auth.php';
?>
	<div id="formEtErreur">
		<?php
			if (isset($_SESSION['erreur']))
				echo "<div class='erreurConnexion'><p>".$erreur."</p></div>";
		?>
		<form method="POST" action="verifConnexion.php" id="formConnexion">
			<h2>Connexion</h2>
			<input type="text" name="txtLogin" class="text-field" placeholder="Identifiant" />
			<input type="password" name="txtPass" class="text-field" placeholder="Mot de passe" />
			<input type="submit" value="Connexion" class="button" /><br />
			<div class="mdpPerdu"><a href="formOublieMdp.php">Mot de passe perdu ?</a></div>
		</form>
	</div>
	
<?php include '../../footer.php'; ?>

