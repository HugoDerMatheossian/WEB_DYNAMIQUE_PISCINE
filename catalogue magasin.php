<?php

	$categorie = isset($_POST["categorie"])? $_POST["categorie"] : "";

	//On identifie la base de donnees objets vendeur
	$database = "objets vendeur";

	//On s'y connecte
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	if($categorie == "meuble")
	{
		//On selectionne tous les objets meuble de la base de donnees
		$sql = "SELECT * FROM `objets vendeur` WHERE categorie LIKE '%meubles et objets d art%'";
		$result = mysqli_query($db_handle, $sql);
		$noms = array();
		$prix = array();
		$images = array();
		$compteur = 0;
		while(($data = mysqli_fetch_assoc($result))&&($compteur<6))
		{
			$noms[$compteur] = $data['nom'];
			$prix[$compteur] = $data['prix'];
			$images[$compteur] = $data['image'];
			$compteur = $compteur + 1;
		}
	}
	else if($categorie == "accessoire")
	{
		//On selectionne tous les objets meuble de la base de donnees
		$sql = "SELECT * FROM `objets vendeur` WHERE categorie LIKE '%accessoire vip%'";
		$result = mysqli_query($db_handle, $sql);
		$noms = array();
		$prix = array();
		$images = array();
		$compteur = 0;
		while (($data = mysqli_fetch_assoc($result))&&($compteur<6))
		{
			$noms[$compteur] = $data['nom'];
			$prix[$compteur] = $data['prix'];
			$images[$compteur] = $data['image'];
			$compteur = $compteur + 1;
		}
	}
	else //Cas materiel
	{
		//On selectionne tous les objets meuble de la base de donnees
		$sql = "SELECT * FROM `objets vendeur` WHERE categorie LIKE '%materiels scolaires%'";
		$result = mysqli_query($db_handle, $sql);
		$noms = array();
		$prix = array();
		$images = array();
		$compteur = 0;
		while (($data = mysqli_fetch_assoc($result))&&($compteur<6))
		{
			$noms[$compteur] = $data['nom'];
			$prix[$compteur] = $data['prix'];
			$images[$compteur] = $data['image'];
			$compteur = $compteur + 1;
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Catalogue magasin</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      
        	<select name="categorie" id="categorie">
        		<option onchange="catalogue magasin.php" value="">--Choisissez une catégorie--</option>
        		<option  value="meuble">Meubles et objets d'arts</option>
        		<option onchange="catalogue magasin.php" value="accessoire">Accessoires VIP</option>
        		<option onchange="catalogue magasin.php" value="materiel">Matériels scolaires</option>
        	</select>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Votre compte</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Panier</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading"><?php echo "$noms[0]" ?></div>
        <div class="panel-body"><img src="<?php echo "$images[0]" ?>" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer"><?php echo "$prix[0]" ?> euros</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-danger">
        <div class="panel-heading"><?php echo "$noms[1]" ?></div>
        <div class="panel-body"><img src="<?php echo "$images[1]" ?>" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer"><?php echo "$prix[1]" ?> euros</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-success">
        <div class="panel-heading"><?php echo "$noms[2]" ?></div>
        <div class="panel-body"><img src="<?php echo "$images[2]" ?>" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer"><?php echo "$prix[2]" ?> euros</div>
      </div>
    </div>
  </div>
</div><br>

<div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading"><?php echo "$noms[3]" ?></div>
        <div class="panel-body"><img src="<?php echo "$images[3]" ?>" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer"><?php echo "$prix[3]" ?> euros</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading"><?php echo "$noms[4]" ?></div>
        <div class="panel-body"><img src="<?php echo "$images[4]" ?>" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer"><?php echo "$prix[4]" ?> euros</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading"><?php echo "$noms[5]" ?></div>
        <div class="panel-body"><img src="<?php echo "$images[5]" ?>" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer"><?php echo "$prix[5]" ?> euros</div>
      </div>
    </div>
  </div>
</div>
</body>
</html>