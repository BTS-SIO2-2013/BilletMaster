<?php
	// La racine du site (dossiers) : ex : www
	//if (!defined('BASE_URI')) define ('BASE_URI',''.$_SERVER['DOCUMENT_ROOT'].'/BilletMaster');
	// La racine du site (URL) : ex : http://www.exemple.com
	//if (!defined('BASE_URL')) define ('BASE_URL','http://'.$_SERVER['HTTP_HOST'].'');
	// TO DO //
	// Fichier de configuration du serveur
	//define ('MYSQL',BASE_URI.'mysql.inc.php');
	define('WEBROOT',dirname(__FILE__)); 
	define('ROOT',dirname(WEBROOT)); 
	define('DS',DIRECTORY_SEPARATOR); 
	define('BASE_URL',dirname(dirname($_SERVER['SCRIPT_NAME']))); 
	define('CLASSE','class'.DS); 
	define('CSS','css'.DS); 
	define('JS','js'.DS); 
	define('IMG','img'.DS); 
	define('INC','includes'.DS); 
	define('MOD','modules'.DS);
	define('EMP',MOD.'employe'.DS);
	define('EVT',MOD.'evenement'.DS);
	define('SAL',MOD.'salle'.DS);
	define('STA',MOD.'stat'.DS);
	define('TIC',MOD.'ticket'.DS);
	define('CON',MOD.'connexion'.DS);
	define('JPGRAPH',MOD.'jpgraph'.DS);
?>