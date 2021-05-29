<?php
	
	//On demarre la session
	session_start();

	$ID = isset($_POST["ID"])? $_POST["ID"] : "";
	$nom = isset($_POST["nom"])? $_POST["nom"] : "";
	$linetosuppr = isset($_POST["linetosuppr"])? $_POST["linetosuppr"] : "";

	//Si on appuie sur le bouton ajouter au panier
	if (isset($_POST["btn1"]))
	{
		//On ajoute le produit au panier de l'acheteur
		array_push($_SESSION['panier']['ID'], $ID);
		array_push($_SESSION['panier']['nom'], $nom);
	}

	//Si on appuie sur le bouton supprimer
	if (isset($_POST["suppr"]))
	{
		//On supprime l'objet de la liste de session et on reindexe celle-ci
		unset($_SESSION['panier']['ID'][$linetosuppr-1]);
		unset($_SESSION['panier']['nom'][$linetosuppr-1]);
		$_SESSION['panier']['ID'] = array_values($_SESSION['panier']['ID']);
		$_SESSION['panier']['nom'] = array_values($_SESSION['panier']['nom']);
	}

	if(count($_SESSION['panier']['ID']))
	{

		//On identifie la base de donnees objets vendeur
		$database = "objets vendeur";

		//On s'y connecte
		$db_handle = mysqli_connect('localhost', 'root', '');
		$db_found = mysqli_select_db($db_handle, $database);

		//On va parcourir l'array $_SESSION['panier'] afin de recuperer chaque objet de la base de donnees

		$IDtemp = array();
		$nomtemp = array();

		for ($i = 0; $i < count($_SESSION['panier']['ID']); $i++)
		{
			$IDtemp[$i] = $_SESSION['panier']['ID'][$i];
			$nomtemp[$i] = $_SESSION['panier']['nom'][$i];
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="panier.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<title>
		Votre Panier
	</title>
</head>
<body>
	<div class="jumbotron">
        <div class="container text-center">
            <h1>ECE Market Place</h1>      
            <p>Trouver, négocier, acheter</p>
        </div>
    </div>

    <nav class="Barre de navigation navbar-inverse">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="catalogue magasin.php">Catalogue</a>
            </li>
            <li>
                <a href="votre_commpte.html"><span class="glyphicon glyphicon-user"></span> Votre compte</a>
            </li>
            <li>
                <a href="panier.php"><span class="glyphicon glyphicon-shopping-cart"></span> Panier</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

<?php
	echo "<h3>Informations sur le contenu du panier :</h3><br>
	<table class='table1'>
		<tr>
			<th>ID vendeur</th>
			<th>Nom</th>
			<th>Description</th>
			<th>Prix</th>
			<th>Catégorie</th>
			<th>Image</th>
		</tr>";

	if(count($_SESSION['panier']['ID']))
	{
		$prixtotal = 0;

		//On va chercher les objets sur la BDD puis on les stocks dans des arrays
		for ($j = 0; $j < count($_SESSION['panier']['ID']); $j++) 
		{
			
			$sql = "SELECT * FROM `objets vendeur` WHERE ID = '$IDtemp[$j]' AND nom LIKE '%$nomtemp[$j]%'";
			
			$result = mysqli_query($db_handle, $sql);
			$data = mysqli_fetch_assoc($result);

			echo "<tr>";
			echo "<td>" . $data['ID'] . "</td>";
			echo "<td>" . $data['nom'] . "</td>";
			echo "<td>" . $data['description'] . "</td>";
			echo "<td>" . $data['prix'] . "</td>";
			echo "<td>" . $data['categorie'] . "</td>";
			$image = $data['image'];
			echo "<td>" . "<img src='$image' height='120' width='100'>" . "</td>";
			echo "</tr>";

			$prixtotal += $data['prix'];
		}
		echo"</table>";
	}
?>

	<div>
		<div class="supprel">
			<form action="panier.php" name="supprimer" method="post">
				<input type="number" name="linetosuppr" placeholder="Ligne à supprimer"></input>
				<input type="submit" name="suppr" onclick="document.supprimer.submit();" value="Supprimer"></input>
			</form>
		</div>

		<div class="prixtotal">
			<p>
				Le montant total est de : <?php if(count($_SESSION['panier']['ID'])) echo "$prixtotal" ?> euros
			</p>
		</div>
		<div class="btnmid">
			<form action="payer.php" method="post">
				<input type="submit" name="payer" value="Payer"></input>
				<input type="hidden" name="total"></input>
			</form>
		</div>
	</div>	
</body>
</html>