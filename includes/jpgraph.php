<?php

	require_once ('../jpgraph/src/jpgraph.php');
	require_once ('../jpgraph/src/jpgraph_pie.php');
	require_once ('../jpgraph/src/jpgraph_pie3d.php');
	
	// Réecuperation valeur
	$resNonValid = $_GET["resNon"];
	$resValid = $_GET["res"];

	// Si variable null on initialise a 0
	if($resNonValid == null){$resNonValid=0;}
	if($resValid == null){$resValid=0;}

	// On met nos variable dans un tableau
	$data = array($resNonValid,$resValid);

	// Creation du graphique avec sa taille
	$graph = new PieGraph(450,300);

	// Choix du theme
	$theme_class= new VividTheme;
	$graph->SetTheme($theme_class);

	// Ajout d'un titre
	$graph->title->Set("Statistiques tickés validés");

	// Creation du graph
	$p1 = new PiePlot3D($data);
	$graph->Add($p1);

	// Style
	$p1->ShowBorder();
	$p1->SetColor('black');
	$p1->ExplodeSlice(1);

	$graph->Stroke();
	
?>