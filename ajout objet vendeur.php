<?php
	echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"ajout objet vendeur php.css\">";

	//On recupere les donnees en provenance du formulaire
	$vendeur = isset($_POST["vendeur"])? $_POST["vendeur"] : "";
	$nom = isset($_POST["nom"])? $_POST["nom"] : "";
	$description = isset($_POST["description"])? $_POST["description"] : "";
	$prix = isset($_POST["prix"])? $_POST["prix"] : "";
	$unites = isset($_POST["unites"])? $_POST["unites"] : "";
	$categorie = isset($_POST["categorie"])? $_POST["categorie"] : "";
	$image = isset($_POST["image"])? $_POST["image"] : "";

	//On identifie la base de donnees objets vendeur
	$database = "objets vendeur";

	//On s'y connecte
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	//Si le boutton "Ajouter" est cliqué
	if (isset($_POST["boutton1"])) 
	{
		if ($db_found) 
		{
			//On cherche cet objet dans notre BDD
			$sql = "SELECT * FROM `objets vendeur`";
			//On affine la recherche avec le nom et l'ID vendeur
			if ($vendeur != "")
			{
				$sql .= " WHERE ID = '$vendeur'";
			}
			if ($nom != "") {
			$sql .= " AND nom LIKE '%$nom%'";
			}		
			$result = mysqli_query($db_handle, $sql);
			//On regarde s'il y a des résultats (si l'objet existe deja)
			if (mysqli_num_rows($result) != 0) 
			{
				//Cet objet existe déjà dans notre BDD
				echo "Cet objet existe déja.<br>";
			} 
			else 
			{
				//On ajoute cet objet dans notre BDD
				$sql = "INSERT INTO `objets vendeur`(ID, nom, description, prix, unites, categorie, image) VALUES('$vendeur', '$nom', '$description', '$prix', '$unites', '$categorie', '$image')";
					$result = mysqli_query($db_handle, $sql);
				echo "Ajout réussi ! <br>";
				//On affiche le nouvel objet ajouté
				$sql = "SELECT * FROM `objets vendeur`";
				//Avec l'ID vendeur et le nom de l'objet
				if ($vendeur != "")
				{
					$sql .= " WHERE ID = '$vendeur'";
				}
				if ($nom != "") 
				{
					$sql .= " AND nom LIKE '%$nom%'";
				}
				$result = mysqli_query($db_handle, $sql);
				//Entete tableau
				echo "<h3>Informations sur le nouvel objet ajouté :</h4>";
				echo "<table border='1'>";
				echo "<tr>";
				echo "<th>" . "ID vendeur" . "</th>";
				echo "<th>" . "Nom" . "</th>";
				echo "<th>" . "Description" . "</th>";
				echo "<th>" . "Prix" . "</th>";
				echo "<th>" . "Unités" . "</th>";
				echo "<th>" . "Catégorie" . "</th>";
				echo "<th>" . "Image" . "</th>";
				echo "</tr>";
				//Donnees tableau
				while ($data = mysqli_fetch_assoc($result)) 
				{
					echo "<tr>";
					echo "<td>" . $data['ID'] . "</td>";
					echo "<td>" . $data['nom'] . "</td>";
					echo "<td>" . $data['description'] . "</td>";
					echo "<td>" . $data['prix'] . "</td>";
					echo "<td>" . $data['unites'] . "</td>";
					echo "<td>" . $data['categorie'] . "</td>";
					$image = $data['image'];
					echo "<td>" . "<img src='$image' height='120' width='100'>" . "</td>";
					echo "</tr>";
				}
				echo "</table>";
			}
			
		}
		else 
		{
			echo "La base de données n'est pas trouvée<br>";
		}
	}

	//On ferme enfin la connexion
	mysqli_close($db_handle);
?>