<?php

	$login = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
	$pass = isset($_POST["MotDePasse"])? $_POST["MotDePasse"] : "";

	//On identifie la base de donnees objets vendeur
	$database = "objets vendeur";

	//On s'y connecte
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	$sql = "SELECT * FROM `connexion acheteurs`";
	$result = mysqli_query($db_handle, $sql);
	
	$arraylogin = array();
	$arraypass = array();
	$compteur = 0;

	while($data = mysqli_fetch_assoc($result))
	{
		$arraylogin[$compteur] = $data['login'];
		$arraypass[$compteur] = $data['mdp'];
		$compteur = $compteur + 1;
	}

	//Verifier si $login est dans le tableau des utilisateurs
	$found = false;
	for($i = 0; $i < sizeof($arraylogin); $i++)
	{
		if ($arraylogin[$i] == $login) 
		{
			$found = true;
			$index = $i;
			break;
		}
	}

	//Si l'utilisateur est valide, vérifier son mot de passe
	$connexion = false;
	if ($found) 
	{
			if ($arraypass[$index] == $pass) 
			{
				$connexion = true;
			} 
	}
	//Message
	if (!$found) 
	{
		echo "Connexion refusée. Utilisateur inconnu.";
		echo '<meta http-equiv="refresh" content="5;URL=formulaire de connexion acheteurs.html">';
		echo "<br>";
		echo "Retour à la page de connexion dans 5 secondes";
	}
	else 
	{
		if ($connexion) 
		{
			echo "Connexion okay.";
			//On demarre une session
			session_start();

			$_SESSION['login'] = $_POST['pseudo'];
			$_SESSION['pass'] = $_POST['MotDePasse'];
			
			//Panier
			$_SESSION['panier'] = array();

			//Infos panier necessaire pour retrouver l'objet
			$_SESSION['panier']['ID'] = array();
			$_SESSION['panier']['nom'] = array();

			//Lien vers la page suivante
		} 
		else 
		{
			echo "Connexion refusée. Mot de passe invalide.";
			echo '<meta http-equiv="refresh" content="5;URL=formulaire de connexion acheteurs.html">';
			echo "<br>";
			echo "Retour à la page de connexion dans 5 secondes";
		}
	}
?>