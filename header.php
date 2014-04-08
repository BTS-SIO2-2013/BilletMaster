<?php
	//	Pas d'accès direct
    require 'modules/connexion/confirmConnexion.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;" charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="css/styleConnexion.css" />
		<link rel="stylesheet" type="text/css" href="css/styleListeTicket.css" />
		<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css" />
		<title><?php if(empty($title)){ echo 'Administration TicketMaster'; } else{ echo $title.' - Administration TicketMaster'; } ?></title>
		<script src="js/jquery-2.1.0.min.js"></script>
		<script src="js/jquery.datetimepicker.js"></script>
	</head>
	<body <?php if(!empty($title)){?>id=<?php echo '"'.str_replace(' ', '_', $title).'"';} ?>>