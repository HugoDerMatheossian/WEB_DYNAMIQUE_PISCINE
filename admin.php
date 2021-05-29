<?php
    //recuperer les donnees du formulaire
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"ajout objet vendeur php.css\">";

    $pseudo= isset($_POST["PseudoSeller"])? $_POST["PseudoSeller"] : "";
    $mdp= isset($_POST["mdpSeller"])? $_POST["mdpSeller"] : "";
    $id=isset($_POST["IDSeller"])? $_POST["IDSeller"] : "";
    //identifier votre BDD
	$database = "vendeurs";
    //connectez-vous de la BDD

    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    //si le boutton 2 est appuyé
	if (isset($_POST["button2"])){
		if ($db_found) {
			//on cherche ce vendeur dans notre BDD
			$sql = "SELECT * FROM `vendeurs`";
			// avec son pseudo et son mdp
			if($pseudo!=""){
				$sql .= " WHERE Pseudo LIKE '%$pseudo%'";
			}
			if($mdp!=""){
				$sql .= " AND MotDePasse LIKE '%$mdp%'";
			}
			$result = mysqli_query($db_handle, $sql);
		//regarder s'il y a des résultats
		if (mysqli_num_rows($result) != 0) {
		//cet vendeur existe déjà dans notre BDD
		echo "ce vendeur est deja present on ne peut pas le dedouble. <br>";
		}else{
			//on ajoute ce vendeur dans notre BDD
			$sql = "INSERT INTO `vendeurs`(Pseudo,MotDePasse,ID) VALUES ('$pseudo','$mdp','$id')";
		$result = mysqli_query($db_handle, $sql);
		echo "ce vendeur est inscrit maintenant. <br>";
		//on affiche le nouveau vendeur ajouté
		$sql = "SELECT * FROM `vendeurs`";
		// avec ses pseudo et mdp
		if ($pseudo != ""){
			$sql .= " WHERE Pseudo LIKE '%$pseudo%'";
			if ($mdp != "") {
				$sql .= " AND MotDePasse LIKE '%$mdp%'";
			}
		}
	}
}else {
		echo "Database not found. <br>";
}
//fermer la connexion
mysqli_close($db_handle);
}
     //si le boutton 3 est appuyé
	if (isset($_POST["button3"])){
		if ($db_found) {
			//on cherche ce vendeur dans notre BDD
			$sql = "SELECT * FROM `vendeurs`";
			// avec son pseudo et son mdp
			if($pseudo!=""){
				$sql .= " WHERE Pseudo LIKE '%$pseudo%'";
			}
			if($mdp!=""){
				$sql .= " AND MotDePasse LIKE '%$mdp%'";
			}
			$result = mysqli_query($db_handle, $sql);
		//regarder s'il y a des résultats
		if (mysqli_num_rows($result) != 0) {
		//cet vendeur existe déjà dans notre BDD
		//on supprime ce vendeur dans notre BDD
			$sql = "DELETE FROM `vendeurs` WHERE (Pseudo LIKE '%$pseudo' ) AND ( MotDePasse LIKE '%$mdp' ) ";
			mysqli_query( $db_handle , $sql );
		    echo "ce vendeur s'est fait supprimer. <br>";
		
		}else{
			echo "ce vendeur n'existe pas, on ne peut donc pas le supprimer. <br>";
	}
}else {
		echo "Database not found. <br>";
}
//fermer la connexion
mysqli_close($db_handle);
}
?>
