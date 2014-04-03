<?php
	require_once('class/Personne.class.php');
	//	Pas d'accès direct
    require_once('includes/confirmConnexion.php');
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
		<title>Création d'un employe</title>
		<link rel="stylesheet" type="text/css" href="css/global.css" />
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
		<script type="text/javascript" src="js/verifsForm.js"></script>
		<script type="text/javascript">
		$(function(){
			$("#btnCU").click(function() {
				valid = true;
				var nom = $('#nomInput').val();
				if (nom == "") {
					$('#nomInput').css("border-color","#FF0000");
					$('#nom').next(".message-erreur").fadeIn().text("Veuillez entrer un nom");
					valid = false;
				}
				var prenom = $('#prenomInput').val();
				if (prenom == "") {
					$('#prenomInput').css("border-color","#FF0000");
					$('#prenom').next(".message-erreur").fadeIn().text("Veuillez entrer un prenom");
					valid = false;
				}
				var login = $('#loginInput').val();
				if (login == "") {
					$('#loginInput').css("border-color","#FF0000");
					$('#login').next(".message-erreur").fadeIn().text("Veuillez entrer un login");
					valid = false;
				}
				var tel = $('#telInput').val();
				if (tel == "") {
					$('#telInput').css("border-color","#FF0000");
					$('#telephone').next(".message-erreur").fadeIn().text("Veuillez entrer un numero de telephone");
					valid = false;
				}
				var mail = $('#mailInput').val();
				if ((!(mail.indexOf("@")>=0))||(!(mail.indexOf(".")>=0))) {
					$('#mailInput').css("border-color","#FF0000");
					$('#mail').next(".message-erreur").fadeIn().text("Veuillez entrer une adresse mail valide");
					valid = false;
				}
				var mdp = $('#mdpInput').val();
				if (mdp == "" || mdp.length() < 7) {
					$('#mdpInput').css("border-color","#FF0000");
					$('#mdp').next(".message-erreur").fadeIn().text("Veuillez entrer un mot de passe de 8 caractères au minimum");
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
	                <h1>Liste des employes</h1>
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
					<form action="includes/cuEmploye.php" method="post" id="formCU">
						<div id="idPersonne">
							<input type="text" name="idPersonne" value="" id="idInput" hidden="true"/>
						</div>
						<div id="nom">
							<h6>Nom</h6>
							<input type="text" name="nom" value="" id="nomInput" />
						</div>		
						<div class="message-erreur"></div>
						<div id="prenom">
							<h6>Prenom</h6>
							<input type="text" name="prenom" value="" id="prenomInput" >
						</div>
						<div class="message-erreur"></div>
						<div id="login">
							<h6>Login</h6>
							<input type="text" name="login" value="" id="loginInput">
						</div>
						<div class="message-erreur"></div>
						<div id="mdp">
							<h6>Mot de passe</h6>
							<input type="password" name="mdp" value="" id="mdpInput">
						</div>
						<div class="message-erreur"></div>
						<div id="mail">
							<h6>Mail</h6>
							<input type="text" name="mail" value="" id="mailInput" >
						</div>
						<div class="message-erreur"></div>
						<div id="telephone">
							<h6>Telephone</h6>
							<input type="text" name="telephone" value="" id="telInput"><br/>
						</div>
						<div class="message-erreur"></div>
						<div id="admin">
							<h6>Donner les droits d'administrateur ?</h6>
							<select name="admin" >
								<option selected='selected' value="0">Non</br></option>
								<option value="1">Oui</br></option>
							</select>
						</div>
						<div id="btnCreer">
							<input type="submit" value="Enregistrer" id="btnCU" />
						</div>
					</form>
					
					<form action="includes/dEmploye.php" method="post" id="formdEmploye">
						
						<?php
							$listePersonne = Personne::getListePersonnes();
							$tab = Personne::affichagePersonne($listePersonne);
							print($tab);
						?>
						<div id="idEmploye">
							<input type="submit" value="supprimer" id="supprPersonne" />
						</div>
					</form>
					<div id="basCorps">
						<div id="btnRetour">
	                        <a href="index.php">Retour</a>
	                    </div>
						<div id="btnRetour">
	                    	<a href="index.php">Retour</a>
	                	</div>
	            	</div>
	            </div>
			</div>
		</div>
	</body>
</html>