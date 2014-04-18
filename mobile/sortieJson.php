<?php
    header('Content-type: application/json');

	require $_SERVER['DOCUMENT_ROOT'].'/BilletMaster/class/Salle.class.php';
	require $_SERVER['DOCUMENT_ROOT'].'/BilletMaster/class/Evenement.class.php';
	require $_SERVER['DOCUMENT_ROOT'].'/BilletMaster/class/Ticket.class.php';

	$listeDesEvenements = Evenement::getListeEvenements();
	$listeTickets = array();
	$listeSalle = array();
	

    echo json_encode($listeSalle);
?>