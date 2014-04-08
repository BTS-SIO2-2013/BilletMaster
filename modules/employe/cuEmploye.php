<?php

	//	Connexion
	require_once '../../includes/sqlConnect.php';

    // Recuperation des donnees du formulaire
    $id = $_POST['idPersonne'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $login = $_POST['login'];
    $mdp = $_POST['mdp'];
    $mail = $_POST['mail'];
    $telephone = $_POST['telephone'];
    $admin = $_POST['admin'];


    // Si la variable n'est pas vite => existe donc update
    if($id!=""){
    	try {
    		// TODO : fichier comprenant toutes les requetes stockees
    		$updatePersonne = $bdd->prepare('UPDATE personne SET `nom`=:nom,`prenom`=:prenom, `login`=:login, `motDePasse`=:motDePasse, `adressemail`=:adressemail,`telephone`=:telephone WHERE `id`=:id');
			$updatePersonne->execute(array( // Update dans la table personne
				'nom' => $nom,
				'prenom' => $prenom,
				'login' => $login,
				'motDePasse' => $mdp,
				'adressemail' => $mail,
				'telephone' => $telephone,
				'id' => $id
			));
			$updateEmploye = $bdd->prepare('UPDATE employe set `admin`=:admin WHERE `idEmploye`=:id');
			$updateEmploye->execute(array( // Update dans la table employe
				'admin' => $admin,
				'id' => $id
			));
    	} catch (Exception $e) {
    		echo $e;
    	}
    }else{ //l'utilisateur existe pas => create
    	try {
    		// TODO : fichier comprenant toutes les requetes stockees
    		$insertIntoPersonne = $bdd->prepare('INSERT INTO personne(nom, prenom, adressemail, telephone, login, motDePasse) VALUES(:nom, :prenom, :adressemail, :telephone, :login, :motDePasse)');
			$insertIntoPersonne->execute(array( // Insert dans la table personne
				'nom' => $nom,
				'prenom' => $prenom,
				'adressemail' => $mail,
				'telephone' => $telephone,
				'login' => $login,
				'motDePasse' => hash("sha256",$mdp)
			));
			$insertIntoEmploye = $bdd->prepare('INSERT INTO employe(idEmploye, admin) VALUES(:id,:admin)');
			$insertIntoEmploye->execute(array( // Insert dans la table employe
				'id' => $bdd->lastInsertId(),
				'admin' => $admin	
			));
    	} catch (Exception $e) {
    		echo $e;
    	}
	}
	
	// Qu'est ce que c'est ca benoit ??
/*	if ($id != ""){
		echo $id;
		try {
		$chargePersonne = $bdd -> prepare('SELECT nom, prenom adresseMail, telephone, login, motDePasse, admin from personne, employe WHERE personne.id = employe.idEmploye and id = :id');
		$chargePersonne =-> execute( array(
				<tr><td>Pseudo:</td><td><input type='text' name='nom' value='$nom'/></td>
				));
			}catch (Exception $e){
				echo $e;
			}
	}*/


	// Redirection
	header('Location: crudEmploye.php');

?>