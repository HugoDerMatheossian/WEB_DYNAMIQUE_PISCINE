<?php
$mdpAdmin="Hugo=TheBest";
if(isset($_POST["login"])){
	if(isset($_POST["mdp"]) AND !empty($_POST["mdp"])){
		if ($_POST["mdp"]==$mdpAdmin) {
		   header('location:page administrateur.html');
		   exit;
		}
		else{
			echo "Mot de passe incorrect!";
		}
	}
	else{
		echo "Vous n'avez pas mis de mot de passe!";
	}
}
?>

<form action="" method="post">
	veillez rentrer le mot de passe ci-dessous SVP:<br/>
	Mot de Passe: <input type="text" name="mdp"/>
	<input type="submit" name="login" value="login"/>
</form>