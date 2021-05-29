<?php

	//On demarre la session
	session_start();

	//On detruit toutes les variables de session
	session_unset();

	//On detruit notre session
	session_destroy();

	//On redirige le visiteur a la page d'accueil
	header('location: accueil.html');

?>