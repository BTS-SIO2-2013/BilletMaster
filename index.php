<?php
	//	Pas d'accès direct
    require_once('includes/confirmConnexion.php');
    //	Fichier config
    require_once('includes/config.inc.php');
    //	Fichier entête
	include('header.php');
?>
ACCUEIL !!!!!!
<a href="crudEmploye.php">Liste Employes</a>
<a href="crudSalle.php">Liste des Salles</a>
<a href="crudEvenement.php">Liste des Evenements</a>
<?php include 'footer.php'; ?>