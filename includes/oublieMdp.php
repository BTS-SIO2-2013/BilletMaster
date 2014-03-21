<?php

	session_start();
    require_once '../class/Connexion.class.php';
    //	Connexion
	require_once('sqlConnect.php');
	
    // ---------------------------------------------------------------------
    //  Générer un mot de passe aléatoire
    // ---------------------------------------------------------------------
    function genererMDP ($longueur = 12){
        // initialiser la variable $mdp
        $mdp = "";
 
        // Définir tout les caractères possibles dans le mot de passe, 
        // Il est possible de rajouter des voyelles ou bien des caractères spéciaux
        $possible = "0123456789abcdefghijklmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ?!:/=)-&";
 
        // obtenir le nombre de caractères dans la chaîne précédente
        // cette valeur sera utilisé plus tard
        $longueurMax = strlen($possible);
 
        if ($longueur > $longueurMax) {
            $longueur = $longueurMax;
        }
 
        // initialiser le compteur
        $i = 0;
 
        // ajouter un caractère aléatoire à $mdp jusqu'à ce que $longueur soit atteint
        while ($i < $longueur) {
            // prendre un caractère aléatoire
            $caractere = substr($possible, mt_rand(0, $longueurMax-1), 1);
 
            // vérifier si le caractère est déjà utilisé dans $mdp
            if (!strstr($mdp, $caractere)) {
                // Si non, ajouter le caractère à $mdp et augmenter le compteur
                $mdp .= $caractere;
                $i++;
            }
        }
 
        // retourner le résultat final
        return $mdp;
    }

    if (empty($_POST["adresseMail"])){
    	$_SESSION['erreurMail'] = "Vous devez renseigner une adresse mail.";
    	header ("Location: ../oublieMdp.php");
    }else{
     	$mail = $_POST["adresseMail"];
     	try {
    		// TODO : fichier comprenant toutes les requetes stockees
    		$selectMail = "SELECT motDePasse FROM personne WHERE adresseMail = '$mail'";
			$exist = $bdd->query($selectMail);
			if($exist->rowCount() != 1){
				$_SESSION['erreurMail']="Mail inexistant.";
				header ("Location: ../oublieMdp.php");
			} else { 
                $newMdp = genererMDP();
                echo("Votre nouveau mot de passe est '$newMdp'");
                $newMdpCrypte = hash("sha256", $newMdp);
                //Fonction mail prend en paramètre une adresse mail, un sujet et un message
                //mail('$mail', "Mot de passe oublié", "Bonjour, voici votre nouveau mot de passe : '$newMdp'");
                // TODO : fichier comprenant toutes les requetes stockees
                $updatePersonne = $bdd->prepare('UPDATE personne SET `motDePasse`=:motDePasse WHERE `adresseMail`=:adresseMail');
                $updatePersonne->execute(array( // Update dans la table personne
                    'motDePasse' => $newMdpCrypte,
                    'adresseMail' => $mail
                ));
			}
    	} catch (Exception $e) {
    		echo $e;
    	} 
    }



	
?>