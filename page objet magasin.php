<?php

	$ID = isset($_GET["varID"])? $_GET["varID"] : "";
	$nom = isset($_GET["varnom"])? $_GET["varnom"] : "";

	//On identifie la base de donnees objets vendeur
	$database = "objets vendeur";

	//On s'y connecte
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	//On recupere l'objet en question afin d'en afficher toutes les caracteristiques
	$sql = "SELECT * FROM `objets vendeur` WHERE ID = '$ID' AND nom LIKE '%$nom%'";
	$result = mysqli_query($db_handle, $sql);
	$data = mysqli_fetch_assoc($result);

	$ID = $data['ID'];
	$nom = $data['nom'];
	$description = $data['description'];
	$prix = $data['prix'];
	$unites = $data['unites'];
	$categorie = $data['categorie'];
	$image = $data['image'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="page objet magasin.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<title><?php echo "$nom" ?></title>
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
	        <li><a href="votre_commpte.html"><span class="glyphicon glyphicon-user"></span> Votre compte</a></li>
	        <li><a href="panier.php"><span class="glyphicon glyphicon-shopping-cart"></span> Panier</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>

	<div class="objet">
		<table cellspacing="0">
			<tr>
				<td rowspan="5"><img src="<?php echo "$image" ?>"></td>
				<td><?php echo "$nom" ?></td>
			</tr>
			<tr>
				<td>Prix : <?php echo "$prix" ?> euros</td>
			</tr>
			<tr>
				<td>Description : <br><?php echo "$description" ?></td>
			</tr>
			<tr>
				<td>En stock : <?php echo "$unites" ?> restants</td>
			</tr>
			<tr>
				<td>Catégorie : <?php echo "$categorie" ?></td>
			</tr>
		</table>
	</div>

	<div>
		<form action="panier.php" method="post">
			<input type="hidden" name="ID" value="<?php echo "$ID" ?>"></input>
			<input type="hidden" name="nom" value="<?php echo "$nom" ?>"></input>
			<input type="submit" name="btn1" value="Ajouter au panier" id="btn1"></input>
		</form>
		<a href="catalogue magasin.php" class="btn">Retour</a>
	</div>
</body>
</html>