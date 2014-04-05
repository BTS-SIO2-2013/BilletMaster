<?php

	//	Connexion
	require_once('includes/sqlConnect.php');
	//	Classe Evenement
	require_once('class/Evenement.class.php');
	//	Classe Salle
	require_once('class/Salle.class.php');

    // On récupère l'identifiant de l'événement choisi
	$idEvenement = isset($_POST['idEvenement']) ? $_POST['idEvenement'] : false;
	$lEvenement = Evenement::getInfosEvenement($idEvenement);

    if($idEvenement!=null){
    	try {
    		echo'
			<form action="" method="post" id="modifEvenement">
				<div class="modifEvenement">
					<div class="msg"></div>
					<h4>Modifier evenement ID '.$lEvenement->id.'</h4>
					<input type="text" name="idEvenement" id="idEvenement" value="'.$lEvenement->id.'" hidden="true" />
					<input type="text" name="idEmploye" id="idEmploye" value="'.$lEvenement->idEmploye.'" hidden="true" />
					<label for="dateDebutVente">Date debut vente : </label>
					<input type="text" name="dateDebutVente" id="dateDebutVente" value="'.$lEvenement->dateDebutVente.'" class="dateTime" /><br /><br />
					<label for="dateFinVente">Date fin vente : </label>
					<input type="text" name="dateFinVente"  id="dateFinVente" value="'.$lEvenement->dateFinVente.'" class="dateTime" /><br /><br />
					<label for="dateDebutEvenement">Date debut evenement : </label>
					<input type="text" name="dateDebutEvenement" id="dateDebutEvenement" value="'.$lEvenement->dateDebutEvenement.'" class="dateTime" /><br /><br />
					<label for="dateFinEvenement">Date fin evenement : </label>
					<input type="text" name="dateFinEvenement" id="dateFinEvenement" value="'.$lEvenement->dateFinEvenement.'" class="dateTime" /><br /><br />
					<label for="libelle">Libelle : </label>
					<input type="text" name="libelle" id="libelle" value="'.$lEvenement->libelle.'" /><br /><br />
					<label for="salle">Salle : </label>
					<span id="salle">'.Salle::affichageComboBoxSelected(Salle::getListeSalles(), $lEvenement->id).'</span><br /><br />
				</div>
				<input type="submit" name="modifEvenement" id="modifEvenement" value="Valider" />
				
			</form>';
    	} catch(Exception $e) {
    		echo $e;
    	}
    }

?>

<script>
//
//
// TO DO
//
//
$(document).ready(function() { //attend le chargement de la page pour executer le script 
	$('#modifEvenement').submit(function(event) {
    	// je récupère les valeurs
    	var id = $('#idEvenement').val();
        var dateDebutVente = $('#dateDebutVente').val();
        var dateFinVente = $('#dateFinVente').val();
        var dateDebutEvenement = $('#dateDebutEvenement').val();
        var dateFinEvenement = $('#dateFinEvenement').val();
        var libelle = $('#libelle').val();
        var idEmploye = $('#idEmploye').val();
        var idSalle = $('#lstSalle').val();
        // je vérifie une première fois pour ne pas lancer la requête HTTP
        // si je sais que mon PHP renverra une erreur
            // appel Ajax
            $.ajax({
                url: "modifLEvenement.php", // le nom du fichier indiqué dans le formulaire
                type: "POST", // la méthode indiquée dans le formulaire (get ou post)
                // data: $(this).serialize(), // je sérialise les données (voir plus loin), ici les $_POST
                data: 'data={"id":"'+id+'","dateDebutVente":"'+dateDebutVente+'","dateFinVente":"'+dateFinVente+'","dateDebutEvenement":"'+dateDebutEvenement+'","dateFinEvenement":"'+dateFinEvenement+'","libelle":"'+libelle+'","idEmploye":"'+idEmploye+'","idSalle":"'+idSalle+'"}',
                success: function(option) { // je récupère la réponse du fichier PHP
                	$('.msg').html("OK");
                }
            });
    	event.preventDefault();
    	return false; // j'empêche le navigateur de soumettre lui-même le formulaire
	});

	$('.dateTime').datetimepicker({ 
		format:'d/m/Y H:i',
		lang:'fr'
	});
}); 
</script>