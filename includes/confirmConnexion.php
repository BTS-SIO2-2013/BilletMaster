<?php
    /* Démarrage de la session */
    session_start();
    /* Pas d'accès direct */
    if(!isset($_SESSION["laPersonne"]))
        header('Location: connexion.php');
?>
