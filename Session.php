<?php session_start(); 
	$_SESSION['pseudo'= Hugo];
	$_SESSION['email'= Hugodermath@gmail.com]

	echo $_SESSION['pseudo']
	echo$_SESSION['email']
	$
	var_dump($_SESSION);
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Session vendeur</title>
</head>
<body>
		<h1> De retour sur notre site </h1>
		<?php
			if(isset($_SESSION['pseudo']) && (isset($_SESSION['email']))))
			{
				echo "<p> pseudo : "<?= $_SESSION['pseudo']; ?> </p>;
				 <p> email :<?= $_SESSION['email']; ?> </p>
			}
			<?php>

		}else{ 
			echo "connectez vous à votre compte",
			}
		
</body>
</html>

