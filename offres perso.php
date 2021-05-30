<?php
    session_start();
    //On identifie la base de donnees objets vendeur
	$database = "objets vendeur";
	//On s'y connecte
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);
	if($db_found){
		//on affiche toute les offres qui ont le même id que celui du vendeur actuellement connecté avec cette session
		$sql = "SELECT * FROM `objets vendeur`" ;
		$result = mysqli_query($db_handle, $sql);
				//Entete tableau
				echo "<h3>Informations sur vos offres:</h4>";
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
				while ($data = mysqli_fetch_assoc($result) ) 
				{
					if($data['ID']==$_SESSION['ID'])	
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
					
				}
				echo "</table>";
	}
	else{
		echo "La base de données n'est pas trouvée<br>";
	}

	//On ferme enfin la connexion
	mysqli_close($db_handle);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>offres perso </title>
</head>
<body>
</body>
</html>