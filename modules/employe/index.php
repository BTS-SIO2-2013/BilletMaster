<?php
	include $_SERVER['DOCUMENT_ROOT'].'/BilletMaster/header.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/BilletMaster/class/Personne.class.php';
	//	Pas d'accès direct
 ?>


<div id="bg">
	<div id="hautPage">
        <div id="titre">
            <h1>Liste des employes</h1>
        </div>
		<div id="filAriane">
        </div>
    </div>
	<div id="corps">
        <div id="hautCorps">
        </div>
		<div id="milieuCorps">
			<form action="cuEmploye.php" method="post" id="formCU">
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
					<input type="password" name="mdp" value="" id="mdpInput" onkeyup="passwordStrength(this.value)">
				</div>
				<p>
					<div id="passwordDescription">Aucun mot de passe</div>
					<div id="passwordStrength" class="strength0"></div>
				</p>
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
					<input type="submit" value="Enregistrer" id="btnCU" class="btn"/>
				</div>
			</form>
			
			<form action="dEmploye.php" method="post" id="formdEmploye">
				
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
                    <a href="/BilletMaster/index.php">Retour</a>
                </div>
            </div>
        </div>
	</div>
</div>
<script type="text/javascript" src="/BilletMaster/js/employe.js">
</script>
<?php
include $_SERVER['DOCUMENT_ROOT'].'/BilletMaster/footer.php';
?>