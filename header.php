<?php
	//	Pas d'accès direct
    require 'modules/connexion/confirmConnexion.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;" charset="utf-8" />
		<?php include $_SERVER['DOCUMENT_ROOT']."/BilletMaster/css.php" ?>
		<title><?php if(empty($title)){ echo 'Administration TicketMaster'; } else{ echo $title.' - Administration TicketMaster'; } ?></title>
	</head>
	<body <?php if(!empty($title)){?>id=<?php echo '"'.str_replace(' ', '_', $title).'"';} ?>>
		<?php include $_SERVER['DOCUMENT_ROOT']."/BilletMaster/modules/topbar/topbar.php" ?>
		