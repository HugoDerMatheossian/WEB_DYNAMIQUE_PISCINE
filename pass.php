<?php
	$login = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
	$pass = isset($_POST["MotDePasse"])? $_POST["MotDePasse"] : "";
	//Associative array: Utilisateur => mots de passe
	//Dans cet exemple, seulement 3 utilisateurs sont connus
	$users = array("vendeur1" => "vendeur1mdp", 
		 "vendeur2" => "vendeur2mdp", );
	//Verifier si $login est dans le tableau des utilisateurs
	$found = false;
	foreach ($users as $key => $value) {
			if ($key == $login) {
			$found = true;
			break;
	}
	}
	//Si l'utilisateur est valide, vérifier son mot de passe
	$connexion = false;
	if ($found) {
		for ($i = 0; $i < count($users); $i++) {
			if ($users[$login] == $pass) {
				$connexion = true;
				break;
			} 
		}
	}
	//Message
	if (!$found) {
		echo "Connexion refusée. Utilisateur inconnu.";
	} else {
		if ($connexion) {
			echo "Connexion okay.";
		} else {
			echo "Connexion refusée. Mot de passe invalide.";
	}
}
?>