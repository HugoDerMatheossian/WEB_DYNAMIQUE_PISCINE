<?php
	//recuprer les données venant de votre formulaire
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"ajout objet vendeur php.css\">";

	$nometprenom = isset($_POST["Nom_et_prénom"])? $_POST["Nom_et_prénom"] : "";
	$adresseligne1= isset($_POST["adresse_ligne1"])? $_POST["adresse_ligne1"] : "";
	$adresseligne2 = isset($_POST["adresse_ligne2"])? $_POST["adresse_ligne2"] : "";
 	$Ville = isset($_POST["Ville"])? $_POST["Ville"] : "";
 	$Codepostale= isset($_POST["code_postale"])? $_POST["code_postale"] : "";
 	$pays= isset($_POST["pays"])? $_POST["pays"] : "";
 	$typedepaiement= isset($_POST["type_de_paiement"])? $_POST["type_de_paiement"] : "";
 	$numcarte= isset($_POST["num_carte"])? $_POST["num_carte"] : "";
 	$nomsurlacarte= isset($_POST["nom_sur_la_carte"])? $_POST["nom_sur_la_carte"] : "";
 	$codedesecurite= isset($_POST["code_de_sécurité"])? $_POST["code_de_sécurité"] : "";
 	$datedexpiration= isset($_POST["date_dexpiration"])? $_POST["date_dexpiration"] : "";
 	$telephone= isset($_POST['Telephone'])? $_POST["Telephone"] : "";
 	$pseudo= isset($_POST['pseudo'])? $_POST["pseudo"] : "";
 	$mdp= isset($_POST['mdp'])? $_POST["mdp"] : "";
	//identifier votre BDD
	$database = "acheteurs";

	//connectez-vous de la BDD

	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);
	
	//si le boutton 1 est appuyé
	if (isset($_POST["button1"])) {
	if ($db_found) {
	//on cherche cet acheteur dans notre BDD
		$sql = "SELECT * FROM `acheteurs`";
		// avec ses nom prenom et son num de carte
		if ($nometprenom != ""){
		$sql .= " WHERE Nometprenom LIKE '%$nometprenom%'";
		if ($numcarte!= "") {
			$sql .= " AND numerodecarte LIKE '%$numcarte%'";
			}
		}
		$result = mysqli_query($db_handle, $sql);
		//regarder s'il y a des résultats
		if (mysqli_num_rows($result) != 0) {
		//cet acheteur existe déjà dans notre BDD
		echo "cet acheteur est deja present on ne peut pas le dedouble. <br>";
	} else {
		//on ajoute cet acheteur dans notre BDD
		$sql = "INSERT INTO `acheteurs`(Nometprenom, adresseligne1, adresseligne2, Ville, Codepostale, Pays, typedecartedepaiement, numerodecarte, Nomsurlacarte, datedexpiration, Codesecurite, Numerodetelephone,Pseudo,MDP) VALUES ('$nometprenom','$adresseligne1','$adresseligne2','$Ville','$Codepostale','$pays','$typedepaiement','$numcarte','$nomsurlacarte','$datedexpiration','$codedesecurite','$telephone','$pseudo','$mdp')";
		$result = mysqli_query($db_handle, $sql);
		echo "Votre experience d'acheteur sut notre site commence maintenant. <br>";

		//on affiche le nouvel acheteur ajouté
		$sql = "SELECT * FROM `acheteurs`";
		// avec ses nom et prénom et numéro de carte
		if ($nometprenom != ""){
			$sql .= " WHERE Nometprenom LIKE '%$nometprenom%'";
			if ($numcarte != "") {
				$sql .= " AND numerodecarte LIKE '%$numcarte%'";
		}
	}
	$result = mysqli_query($db_handle,$sql);
			echo "<h1>informations nouvel acheteur ajoute</h1>";
			echo"<table>";
			echo "<tr>";
			echo "<th>" . "Nom et prenom" . "</th>";
			echo "<th>" . "adresse ligne1" . "</th>";
			echo "<th>" . "adresse ligne2" . "</th>";
			echo "<th>" . "Ville" . "</th>";
			echo "<th>" . "Code Postale" . "</th>";
			echo "<th>" . "pays" . "</th>";
			echo "<th>" . "type de paiement" . "</th>";
			echo "<th>" . "num carte" . "</th>";
			echo "<th>" . "nom sur la carte" . "</th>";
			echo "<th>" . "code de securite" . "</th>";
			echo "<th>" . "date d'expiration" . "</th>";
			echo "<th>" . "Telephone" . "</th>";
			echo "<th>" . "Pseudo" . "</th>";
			echo "<th>" . "Mot de passe" . "</th>";
			echo "</tr>";
			//afficher les résultats
			while ($data = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $data['Nometprenom'] . "</td>";
				echo "<td>" . $data['adresseligne1'] . "</td>";
				echo "<td>" . $data['adresseligne2'] . "</td>";
				echo "<td>" . $data['Ville'] . "</td>";
				echo "<td>" . $data['CodePostale'] . "</td>";
				echo "<td>" . $data['Pays'] . "</td>";
				echo "<td>" . $data['typedecartepaiement'] . "</td>";
				echo "<td>" . $data['numerodecarte'] . "</td>";
				echo "<td>" . $data['Nomsurlacarte'] . "</td>";
				echo "<td>" . $data['Codesecurite'] . "</td>";
				echo "<td>" . $data['datedexpiration'] . "</td>";
				echo "<td>" . $data['Numerodetelephone'] . "</td>";
				echo "<td>" . $data['Pseudo'] . "</td>";
				echo "<td>" . $data['MDP'] . "</td>";
				
				echo "</tr>";
			}
			echo "</table>";	
	}
			} 
			else {
		echo "Database not found. <br>";
	}
	//fermer la connexion
	mysqli_close($db_handle);
	} 
?>
