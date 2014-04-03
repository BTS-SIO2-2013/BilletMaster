<?php
include './class/Salle.class.php';
include './class/Evenement.class.php';
include './class/Personne.class.php';
$listeSalle = Salle::getListeSalles();
$listeEvenements = Evenement::getListeEvenements();
$ListePersonnes = Personne::getListePersonnes();

foreach($listeSalle as $uneSalle){
	$uneSalle->listeDesEvenements = $listeEvenements;
			
}
echo json_encode($listeSalle);

foreach($listeEvenements as $unEvenement){
	echo json_encode($unEvenement);
	echo $unEvenement->libelle;
}


?>