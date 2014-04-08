
<?php

	//	Connexion
	require_once '../../includes/sqlConnect.php';


    // Recuperation des donnees du formulaire
    $id= $_POST['idEmploye'];

    // Pour chaque employe coche
    foreach($id as $lid){
    	try {
    		// TODO : fichier comprenant toutes les requetes stockees
    		$supprimeEmploye = $bdd->prepare('DELETE FROM employe WHERE idEmploye = :id');
			$supprimeEmploye->execute(array('id' => $lid));
			$supprimeUtilisateur = $bdd->prepare('DELETE FROM utilisateur WHERE idutilisateur = :id');
			$supprimeUtilisateur->execute(array('id' => $lid));
			$supprimePersonne = $bdd->prepare('DELETE FROM personne WHERE id = :id');
			$supprimePersonne->execute(array('id' => $lid));
		  } catch (Exception $e) {
    		echo $e;
        }
    }
    
    // Redirection
    header('Location: ../employe/crudEmploye.php');
   
?>
