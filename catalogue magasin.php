<?php

	$categorie = isset($_POST["categorie"])? $_POST["categorie"] : "";
	$next = isset($_POST["next"])? $_POST["next"] : "";
	$recherche = isset($_POST["recherche"])? $_POST["recherche"] : "";

  if ((isset($_POST["btnprv"]))&&($next - 6 >= 0))
	{
		$next = $next - 6;
	}
	else if (isset($_POST["btnnext"]))
	{
		$next = $next + 6;
	}
	else  
	{
		$next = 0;
	}
	//On identifie la base de donnees objets vendeur
	$database = "objets vendeur";

	//On s'y connecte
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	if($categorie == "meuble")
	{
		//On selectionne tous les objets meuble de la base de donnees
		$sql = "SELECT * FROM `objets vendeur` WHERE categorie LIKE '%meubles et objets d art%' LIMIT 6 OFFSET $next";
		$result = mysqli_query($db_handle, $sql);
		$noms = array(0,0,0,0,0,0);
		$prix = array(0,0,0,0,0,0);
		$images = array(0,0,0,0,0,0);
		$ID = array(0,0,0,0,0,0);
		$nxt = $next;
		$compteur = $nxt;
		while(($data = mysqli_fetch_assoc($result))&&($compteur<($nxt+6)))
		{
			$noms[$compteur] = $data['nom'];
			$prix[$compteur] = $data['prix'];
			$images[$compteur] = $data['image'];
			$ID[$compteur] = $data['ID'];
			$compteur = $compteur + 1;
		}
	}
	else if($categorie == "accessoire")
	{
		//On selectionne tous les objets meuble de la base de donnees
		$sql = "SELECT * FROM `objets vendeur` WHERE categorie LIKE '%accessoire vip%' LIMIT 6 OFFSET $next";
		$result = mysqli_query($db_handle, $sql);
		$noms = array(0,0,0,0,0,0);
		$prix = array(0,0,0,0,0,0);
		$images = array(0,0,0,0,0,0);
		$ID = array(0,0,0,0,0,0);
		$nxt = $next;
		$compteur = $nxt;
		while (($data = mysqli_fetch_assoc($result))&&($compteur<($nxt+6)))
		{
			$noms[$compteur] = $data['nom'];
			$prix[$compteur] = $data['prix'];
			$images[$compteur] = $data['image'];
			$ID[$compteur] = $data['ID'];
			$compteur = $compteur + 1;
		}
	}
	else //Cas materiel
	{
		//On selectionne tous les objets meuble de la base de donnees
		$sql = "SELECT * FROM `objets vendeur` WHERE categorie LIKE '%materiels scolaires%' LIMIT 6 OFFSET $next";
		$result = mysqli_query($db_handle, $sql);
		$noms = array(0,0,0,0,0,0);
		$prix = array(0,0,0,0,0,0);
		$images = array(0,0,0,0,0,0);
		$ID = array(0,0,0,0,0,0);
		$nxt = $next;
		$compteur = $nxt;
		while (($data = mysqli_fetch_assoc($result))&&($compteur<($nxt+6)))
		{
			$noms[$compteur] = $data['nom'];
			$prix[$compteur] = $data['prix'];
			$images[$compteur] = $data['image'];
			$ID[$compteur] = $data['ID'];
			$compteur = $compteur + 1;
		}
	}

	if($recherche != "")
	{
		//On selectionne tous les objets correspondant a la recherche
		$sql = "SELECT * FROM `objets vendeur` WHERE nom LIKE '%$recherche%' LIMIT 6 OFFSET $next";
		$result = mysqli_query($db_handle, $sql);
		$noms = array(0,0,0,0,0,0);
		$prix = array(0,0,0,0,0,0);
		$images = array(0,0,0,0,0,0);
		$ID = array(0,0,0,0,0,0);
		$nxt = $next;
		$compteur = $nxt;
		while(($data = mysqli_fetch_assoc($result))&&($compteur<($nxt+6)))
		{
			$noms[$compteur] = $data['nom'];
			$prix[$compteur] = $data['prix'];
			$images[$compteur] = $data['image'];
			$ID[$compteur] = $data['ID'];
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
	<link rel="stylesheet" type="text/css" href="catalogue magasin.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script type="text/javascript">

	</script>
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
  	
  	<form action="catalogue magasin.php" name="rldpage" method="post">
  	<select onChange="document.rldpage.submit();" name="categorie" id="categorie">
  		<option value="">--Choisissez une catégorie--</option>
  		<option value="meuble">Meubles et objets d'arts</option>
  		<option value="accessoire">Accessoires VIP</option>
  		<option value="materiel">Matériels scolaires</option>
  	</select>
  	</form>

      <ul class="nav navbar-nav navbar-right">
        <li>  	
        	
        	<form action="catalogue magasin.php" name="rldpage1" method="post">
  					<input type="text" name="recherche">	
  					<input type="submit" name="recherche1" onclick="document.rldpage1.submit();" value="Rechercher dans la boutique">
  				</form>

  			</li>
        <li><a href="votre_commpte.html"><span class="glyphicon glyphicon-user"></span> Votre compte</a></li>
        <li><a href="panier.php"><span class="glyphicon glyphicon-shopping-cart"></span> Panier</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">    
  <div class="row">
    <div class="col-sm-4" <?php if ($noms[0] == "") echo "style='display:none';"; ?>>
      <form action="page objet magasin.php" method="post">
      <div class="panel panel-primary">
        <div class="panel-heading"><?php echo "$noms[0]" ?></div>
        
        <div class="panel-body"><a href="<?php echo "page objet magasin.php?varnom=".$noms[0]."&varID=".$ID[0].""?>" onclick="this.submit();"><img src="<?php echo "$images[0]" ?>" class="img-responsive" style="width:100%" alt="Image"></div>

        <div class="panel-footer"><?php echo "$prix[0]" ?> euros</div></a>
      	</form>
      </div>
    </div>
    <div class="col-sm-4" <?php if ($noms[1] == "") echo "style='display:none';"; ?>> 
      <div class="panel panel-primary">
        <div class="panel-heading"><?php echo "$noms[1]" ?></div>
        
        <div class="panel-body"><a href="<?php echo "page objet magasin.php?varnom=".$noms[1]."&varID=".$ID[1].""?>" onclick="this.submit();"><img src="<?php echo "$images[1]" ?>" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer"><?php echo "$prix[1]" ?> euros</div></a>
      </div>
    </div>
    <div class="col-sm-4" <?php if ($noms[2] == "") echo "style='display:none';"; ?>> 
      <div class="panel panel-primary">
        <div class="panel-heading"><?php echo "$noms[2]" ?></div>
        <div class="panel-body"><a href="<?php echo "page objet magasin.php?varnom=".$noms[2]."&varID=".$ID[2].""?>" onclick="this.submit();"><img src="<?php echo "$images[2]" ?>" class="img-responsive" style="width:100%" alt="Image"></div>

        <div class="panel-footer"><?php echo "$prix[2]" ?> euros</div></a>
      </div>
    </div>
  </div>
</div><br>

<div class="container">    
  <div class="row">
    <div class="col-sm-4" <?php if ($noms[3] == "") echo "style='display:none';"; ?>>
      <div class="panel panel-primary">
        <div class="panel-heading"><?php echo "$noms[3]" ?></div>
        
        <div class="panel-body"><a href="<?php echo "page objet magasin.php?varnom=".$noms[3]."&varID=".$ID[3].""?>" onclick="this.submit();"><img src="<?php echo "$images[3]" ?>" class="img-responsive" style="width:100%" alt="Image"></div>

        <div class="panel-footer"><?php echo "$prix[3]" ?> euros</div></a>
      </div>
    </div>
    <div class="col-sm-4" <?php if ($noms[4] == "") echo "style='display:none';"; ?>> 
      <div class="panel panel-primary">
        <div class="panel-heading"><?php echo "$noms[4]" ?></div>
        
        <div class="panel-body"><a href="<?php echo "page objet magasin.php?varnom=".$noms[4]."&varID=".$ID[4].""?>" onclick="this.submit();"><img src="<?php echo "$images[4]" ?>" class="img-responsive" style="width:100%" alt="Image"></div>

        <div class="panel-footer"><?php echo "$prix[4]" ?> euros</div></a>
      </div>
    </div>
    <div class="col-sm-4" <?php if ($noms[5] == "") echo "style='display:none';"; ?>> 
      <div class="panel panel-primary">
        <div class="panel-heading"><?php echo "$noms[5]" ?></div>
        
        <div class="panel-body"><a href="<?php echo "page objet magasin.php?varnom=".$noms[5]."&varID=".$ID[5].""?>" onclick="this.submit();"><img src="<?php echo "$images[5]" ?>" class="img-responsive" style="width:100%" alt="Image"></div>

        <div class="panel-footer"><?php echo "$prix[5]" ?> euros</div></a>
      </div>
    </div>
  </div>
</div>
<form action="catalogue magasin.php" method="post" class="btn">
	<input type="submit" name="btnprv" value="Précedent" <?php if ($next == 0) echo "style='display:none';"; ?>></input>
	<input type="submit" name="btnnext" value="Suivant" <?php if ($noms[5] == "") echo "style='display:none';"; ?>></input>
	<input type="hidden" name="next" value="<?php echo "$next" ?>"></input>
	<input type="hidden" name="categorie" value="<?php echo "$categorie" ?>"></input>
</form>
</body>
</html>
