<?php
	//recuprer les données venant de votre formulaire
	$nometprenom = isset($_POST["Nom et prénom"])? $_POST["nom et prenom"] : "";
	$adressligne1= isset($_POST["adressligne1"])? $_POST["adressligne1"] : "";
	$adressligne2 = isset($_POST["adressligne2"])? $_POST["adressligne2"] : "";
 	$Ville = isset($_POST["Ville"])? $_POST["Ville"] : "";
 	$codepostale= isset($_POST["codepostale"])? $_POST["codepostale"] : "";
 	$pays= isset($_POST["pays"])? $_POST["pays"] : "";
 	$typedepaiement= isset($_POST["typedepaiement"])? $_POST["typedepaiement"] : "";
 	$numcarte= isset($_POST["numcarte"])? $_POST["numcarte"] : "";
 	$nomsurlacarte= isset($_POST["nomsurlacarte"])? $_POST["nomsurlacarte"] : "";
 	$codedesecurite= isset($_POST["codedesecurite"])? $_POST["codedesecurite"] : "";
 	$datedexpiration= isset($_POST["datedexpiration"])? $_POST["datedexpiration"] : "";
 	$telephone= isset($_POST["telephone"])? $_POST["telephone"] : "";
	//identifier votre BDD
	$database = "vendeur";

	//connectez-vous de la BDD

	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);
	
	//si le bouton est cliqué
	if (isset($_POST["button1"])) {
		//si la BDD existe
		if ($db_found) {
			if ($ != "") {
			if ($ != "") {
				//on cherche l'objet
				// faire les requetes apres
			}
			$result = mysqli_query($db_handle, $sql);
			//regarder s'il y a des résultats
				if (mysqli_num_rows($result) == 0) {
				/	/pas de résultat
				echo "Pas d'item trouvé". "<br>";
		} else {
			echo "<table border='1'>";
			echo "<tr>";
			echo "<th>" . "nometprenom" . "</th>";
			echo "<th>" . "adressligne1" . "</th>";
			echo "<th>" . "adressligne2" . "</th>";
			echo "<th>" . "Ville" . "</th>";
			echo "<th>" . "pays" . "</th>";
			echo "<th>" . "typedepaiement" . "</th>";
			echo "<th>" . "numcarte" . "</th>";
			echo "<th>" . "nomsurlacarte" . "</th>";
			echo "<th>" . "codedesecurite" . "</th>";
			echo "<th>" . "datedexpiration" . "</th>";
			echo "<th>" . "telephone" . "</th>";
			echo "</tr>";
			//afficher les résultats
			while ($data = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $data['nometprenom'] . "</td>";
				echo "<td>" . $data['adressligne1'] . "</td>";
				echo "<td>" . $data['adressligne2'] . "</td>";
				echo "<td>" . $data['Ville'] . "</td>";
				echo "<td>" . $data['pays'] . "</td>";
				echo "<td>" . $data['typedepaiement'] . "</td>";
				echo "<td>" . $data['nomsurlacarte'] . "</td>";
				echo "<td>" . $data['codedesecurite'] . "</td>";
				echo "<td>" . $data['datedexpiration'] . "</td>";
				echo "<td>" . $data['telephone'] . "</td>";
	"</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
	} else {
		echo "Database not found. <br>";
	}
			}
	//fermer la connexion
	mysqli_close($db_handle);
?>