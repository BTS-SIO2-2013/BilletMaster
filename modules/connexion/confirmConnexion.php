<?php
	//$ROOT = realpath(dirname(__FILE__));
    /* Démarrage de la session */
    session_start();
    /* Pas d'accès direct */
    if(!isset($_SESSION["laPersonne"]))
        header("Location: modules/connexion/formConnexion.php");
?>
