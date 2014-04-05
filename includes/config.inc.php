<?php
	// La racine du site (dossiers) : ex : www
	if (!defined('BASE_URI')) define ('BASE_URI',''.$_SERVER['DOCUMENT_ROOT'].'/BilletMaster');
	// La racine du site (URL) : ex : http://www.exemple.com
	if (!defined('BASE_URL')) define ('BASE_URL','http://'.$_SERVER['HTTP_HOST'].'');
	// TO DO //
	// Fichier de configuration du serveur
	//define ('MYSQL',BASE_URI.'mysql.inc.php');
?>