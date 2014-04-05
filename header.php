<?php 
	//	Pas d'accès direct
    require_once('includes/confirmConnexion.php');
    include('includes/config.inc.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;" charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="/BilletMaster/css/style_connexion.css" />
		<link rel="stylesheet" type="text/css" href="/BilletMaster/css/style_listeTicket.css" />
		<link rel="stylesheet" type="text/css" href="/BilletMaster/css/jquery.datetimepicker.css" />
		<title><?php if(empty($title)){ echo 'Administration TicketMaster'; } else{ echo $title.' - Administration TicketMaster'; } ?></title>
		<script src="/BilletMaster/js/jquery-2.1.0.min.js"></script>
		<script src="/BilletMaster/js/jquery.datetimepicker.js"></script>
	</head>
	<body <?php if(!empty($title)){?>id=<?php echo '"'.str_replace(' ', '_', $title).'"';} ?>>