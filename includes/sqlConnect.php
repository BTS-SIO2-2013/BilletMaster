<?php
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=ticketmaster', 'ticketmaster', 'ticketmaster');
		//	ERRMODE_EXCEPTION génère une exception voulue pour chaque requête si celle-ci n'est pas correcte
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		echo "La base de donnée n'est pas disponible";
        echo $e;
        echo $bdd;
	}