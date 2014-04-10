<?php
	//	Pas d'accès direct
    require 'modules/connexion/confirmConnexion.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;" charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="/BilletMaster/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="/BilletMaster/css/styleConnexion.css" />
		<link rel="stylesheet" type="text/css" href="/BilletMaster/css/styleListeTicket.css" />
		<link rel="stylesheet" type="text/css" href="/BilletMaster/css/jquery.datetimepicker.css" />
		<title><?php if(empty($title)){ echo 'Administration TicketMaster'; } else{ echo $title.' - Administration TicketMaster'; } ?></title>
		<script src="/BilletMaster/js/jquery-2.1.0.min.js"></script>
		<script src="/BilletMaster/js/jquery.datetimepicker.js"></script>
		<script src="/BilletMaster/js/bootstrap.js"></script>
	</head>
	<body <?php if(!empty($title)){?>id=<?php echo '"'.str_replace(' ', '_', $title).'"';} ?>>
		<nav class="navbar navbar-default" role="navigation">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">Brand</a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li><a href="/BilletMaster/modules/employe/crudEmploye.php">Liste Employes</a></li>
		        <li><a href="/BilletMaster/modules/salle/crudSalle.php">Liste des Salles</a></li>
		        <li><a href="/BilletMaster/modules/stat/statistique.php">Statistiques</a></li>
		        <li><a href="/BilletMaster/modules/evenement/crudEvenement.php">Liste des Evenements</a></li>
		        <li><a href="/BilletMaster/modules/ticket/index.php">Gestionnaire des Tickets</a></li>
		      </ul>
		      
		      <ul class="nav navbar-nav navbar-right">
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>