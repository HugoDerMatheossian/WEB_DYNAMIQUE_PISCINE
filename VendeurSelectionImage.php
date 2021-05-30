<?php
	echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"profil.css\">";

	//On recupere les donnees en provenance du formulaire
	$NomVendeur = isset($_POST["NomVendeur"])? $_POST["NomVendeur"] : "";
	$FondEcran = isset($_POST["FondEcran"])? $_POST["FondEcran"] : "";
	$Image = isset($_POST["Image"])? $_POST["Image"] : "";
	//On identifie la base de donnees objets vendeur
	$database = "images et fond decran vendeurs";

	//On s'y connecte
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	//Si le boutton "Soumettre" est cliqué
	if (isset($_POST["Soumettre"])) 
	{
		if ($db_found) 
		{
			//On cherche cet objet dans notre BDD
			$sql = "SELECT * FROM `images et fond decran vendeurs`";
			//On affine la recherche avec le nom et l'ID vendeur
			if ($NomVendeur != "")
			{
				$sql .= " WHERE NomVendeur = '$NomVendeur'";
			}
			if ($FondEcran != "") {
			$sql .= " AND FondEcran LIKE '%$FondEcran%'";
			if ($Image != "")
			$sql .= "AND Image LIKE '%$Image";
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
				$sql = "INSERT INTO `images et fond decran vendeurs`(NomVendeur, FondEcran, Image) VALUES('$NomVendeur', '$FondEcran', '$Image')";
					$result = mysqli_query($db_handle, $sql);
				echo "Ajout réussi ! <br>";
				//On affiche le nouvel objet ajouté
				$sql = "SELECT * FROM `objets vendeur`";
				//Avec l'ID vendeur et le nom de l'objet
				if ($NomVendeur != "")
				{
					$sql .= " WHERE ID = '$NomVendeur'";
				}
				if ($nom != "") 
				{
					$sql .= " AND FondEcran LIKE '%$FondEcran%'";
				}
				$result = mysqli_query($db_handle, $sql);
				//Entete tableau
				echo "<h3>Informations sur le nouvelle photo ajoutée :</h4>";
				echo "<table border='1'>";
				echo "<tr>";
				echo "<th>" . " NomVendeur" . "</th>";
				echo "<th>" . "FondEcran" . "</th>";
				echo "<th>" . "Image" . "</th>";
				echo "</tr>";
				//Donnees tableau
				while ($data = mysqli_fetch_assoc($result)) 
				{
					echo "<tr>";
					echo "<td>" . $data['NomVendeur'] . "</td>";
					$FondEcran = $data['FondEcran'];
					$Image = $data['image'];
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