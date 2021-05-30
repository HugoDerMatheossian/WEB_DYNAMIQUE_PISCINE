<?php

	$login = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
	$pass = isset($_POST["MotDePasse"])? $_POST["MotDePasse"] : "";

	//On identifie la base de donnees objets vendeur
	$database = "vendeurs";

	//On s'y connecte
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	$sql = "SELECT * FROM `vendeurs`";
	$result = mysqli_query($db_handle, $sql);
	
	$arraylogin = array();
	$arraypass = array();
	$compteur = 0;

	while($data = mysqli_fetch_assoc($result))
	{
		$arraylogin[$compteur] = $data['Pseudo'];
		$arraypass[$compteur] = $data['MotDePasse'];
		$compteur = $compteur + 1;
	}

	//Verifier si $login est dans le tableau des vendeurs
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
		echo '<meta http-equiv="refresh" content="5;URL=formulaire vendeur.html">';
		echo "<br>";
		echo "Retour à la page de connexion dans 5 secondes";
	}
	else 
	{
		if ($connexion) 
		{
			echo "Connexion okay.";
			$sql = "SELECT ID FROM `vendeurs` WHERE (Pseudo LIKE '%$login%') AND (MotDePasse LIKE '%$pass%')";

			$result = mysqli_query($db_handle, $sql);
			$data = mysqli_fetch_assoc($result);
			$id = $data['ID'];

			//On demarre une session
			session_start();

			$_SESSION['login'] = $_POST['pseudo'];
			$_SESSION['pass'] = $_POST['MotDePasse'];
			$_SESSION['ID']= $id;


			echo '<meta http-equiv="refresh" content="5;URL=page vendeur.html">';
			echo "<br>";
			echo "Redirection vers la page vendeur personnelle dans 5 secondes";
		} 
		else 
		{
			echo "Connexion refusée. Mot de passe invalide.";
			echo '<meta http-equiv="refresh" content="5;URL=formulaire vendeur.html">';
			echo "<br>";
			echo "Retour à la page de connexion dans 5 secondes";
		}
	}
?>
