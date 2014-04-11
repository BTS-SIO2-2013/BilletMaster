<?php 
	require '../class/Connexion.class.php';
	
	$id = $_POST['id']; 
	$mdp = $_POST['mdp'];
	settype($aut, "boolean");
	$aut = false;
	$message = null;

	if ($id == "")
    {
    	$message = "Vous devez renseigner votre identifiant.";
    }
    else if ($mdp == "")
    {
    	$message = "Vous devez renseigner votre mot de passe.";
    }
    else
    {
        $uneConnexion = new Connexion();
    	$laPersonne = $uneConnexion->GetPersonneByLogin2($id, $mdp);

        if ($laPersonne == null)
    	{
    		$message = "Votre login et/ou mot de passe est incorrect !";
    	}
    	else
    	{
    		$aut = true;
    		$message = null;
    	}
  	}
  	echo '"{\"autOk\":\""'.($aut?'true':'false').'"\",""\"message\":\""'.$message.'"\"}"';