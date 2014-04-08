<?php
    session_start();
    require '../../class/Connexion.class.php';
	
    if ($_POST["txtLogin"] == "")
    {
    	$_SESSION['erreur'] = "Vous devez renseigner votre identifiant.";
    	header ("Location: formConnexion.php");
    }
    else if ($_POST["txtPass"] == "")
    {
    	$_SESSION['erreur'] = "Vous devez renseigner votre mot de passe.";
    	header ("Location: formConnexion.php");
    }
    else
    {
        $uneConnexion = new Connexion();
    	$login = $_POST["txtLogin"];
    	$motDePasse = $_POST["txtPass"];
    			
    	$laPersonne = $uneConnexion->GetPersonneByLogin($login, $motDePasse);
                  
    	if ($laPersonne == null)
    	{
            $_SESSION["laPersonne"] = null;
            $_SESSION['erreur'] = "Votre login et/ou mot de passe est incorrect !";
            header ("Location: formConnexion.php");
    	}
    	else
    	{
            $_SESSION["laPersonne"] = $laPersonne;
            header("Location: ../../index.php");
    	}
    }
?>