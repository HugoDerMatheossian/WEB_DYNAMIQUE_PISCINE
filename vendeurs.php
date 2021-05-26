<?php
	//recuprer les données venant de votre formulaire
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"ajout objet vendeur php.css\">";

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
	
	//si le bouton1 est cliqué
	if (isset($_POST["button1"])) {
		//si la BDD existe
		if ($db_found) {
			$sql = "SElECT* from vendeurs"
			if ($nometprénom != "") {
				//on cherche le vendeur avec son nom
				// faire les requetes 
			$sql.="WHERE nometprenom LIKE '%$nometprenom%'";
			 if ($numcarte !=""){
			 	$sql.="AND Numcarte LIKE '%$numcarte%";
			 }
			$result = mysqli_query($db_handle, $sql);
			//regarder s'il y a des résultats
				if (mysqli_num_rows($result) == 0) {
				/	/pas de résultat
				echo "pas de vendeur trouvé". "<br>";
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
	if (isset($_POST["button2"])) {
	if ($db_found) {
	//on cherche ce livre dans notre BDD
		$sql = "SELECT * FROM vendeurs";
		// avec ses nom prenom et son num de carte
		if ($nometprenom != ""){
		$sql .= " WHERE nometprenom LIKE '%$nometprenom%'";
		if ($numcarte!= "") {
			$sql .= " AND numcarte LIKE '%$numcarte%'";
			}
		}
		$result = mysqli_query($db_handle, $sql);
		//regarder s'il y a des résultats
		if (mysqli_num_rows($result) != 0) {
		//ce livre existe déjà dans notre BDD
		echo "ce vendeur est deja present on ne peut pas le dédoublé. <br>";
	} else {
		//on ajoute ce livre dans notre BDD
		$sql = "INSERT INTO book(nometprenom, adressligne1, adressligne2, Ville, pays, typedepaiement, nomsurlacarte, codedesecurite, datedexpiration, telephone)"
		 VALUES('$nometprenom','$adressligne1', '$adressligne2', '$Ville', '$pays', '$typedepaiement', '$nomsurlacarte','$codedesecurite', '$datedexpiration', '$telephone') 
		$result = mysqli_query($db_handle, $sql);
		echo "ajouté avec succes'. <br>";

		//on affiche le nouveau vendeur ajouté
		$sql = "SELECT * FROM book";
		// avec ses titre et auteurs
		if ($nometprenom != ""){
			$sql .= " WHERE nometprenom LIKE '%$nometprenom%'";
			if ($numcarte != "") {
				$sql .= " AND numcarte LIKE '%$numcarte%'";
		}
	}
	$result = mysqli_query($db_handle,$sql);
			echo "<h1>informations nouveau vendeur ajouté</h1>";
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
$	

	} else {
		echo "Database not found. <br>";
	}
			}
	//fermer la connexion
	mysqli_close($db_handle);
?>