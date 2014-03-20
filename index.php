<?php include 'header.php'; ?>
<?php 
	// verification que l utilisateur est connecte ou non
	if(isset($_SESSION['txtLogin']))	
	{		
		include 'userconnect.php';	
	}	
	else	
	{ ?>

		<form method="POST" action="index.php">
			<h2>Connexion</h2>
			<input type="text" name="txtLogin" class="text-field" placeholder="Identifiant" />
			<input type="password" name="txtPass" class="text-field" placeholder="Mot de passe" />
			<input type="submit" value="Connexion" class="button" />
		</form>
		
	<?php } ?>
<?php include 'footer.php'; ?>

