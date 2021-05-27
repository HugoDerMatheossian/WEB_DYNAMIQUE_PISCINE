<?php
	//On identifie la base de donnees objets vendeur
	$database = "objets vendeur";

	//On s'y connecte
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	//On selectionne tous les objets de la base de donnees
	$sql = "SELECT * FROM `objets vendeur`";
	$result = mysqli_query($db_handle, $sql);
	$noms = array();
	$prix = array();
	$images = array();
	$compteur = 0;
	while(($data = mysqli_fetch_assoc($result))&&($compteur < 12))
	{
		$noms[$compteur] = $data['nom'];
		$prix[$compteur] = $data['prix'];
		$images[$compteur] = $data['image'];
		$compteur = $compteur + 1;
	}	
?>

<!DOCTYPE html>
<html>
<head>
    <title>Magasin Carousel</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="magasin acheteur css.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() 
    {
        var $img = $('#carrousel img');
        var max = $img.length; 
        var i = 0; // compteur
        $img.css('margin-left','0').css('display', 'none'); //on cache les images
        $img.eq(i).css('display', 'inline'); //on affiche l'image courante
        $img.eq(i+1).css('margin-left','200px').css('display', 'inline');
        $img.eq(i+2).css('margin-left','400px').css('display', 'inline');
        $img.eq(i+3).css('margin-left','600px').css('display', 'inline');
        
        function slideImg() 
        {
            setTimeout(function() 
            {
                $img.eq(i).css('display', 'inline').css('transition-delay','0.25s');
                $img.eq(i + 1).css('margin-left','200px').css('display','inline').css('transition-delay','0.5s');
                $img.eq(i + 2).css('margin-left','400px').css('display','inline').css('transition-delay','0.75s');
                $img.eq(i + 3).css('margin-left','600px').css('display','inline').css('transition-delay','1s');
                if (i < max-4) 
                {
                    i = i+4;
                } 
                else 
                {
                    i = 0;
                }
                $img.css('margin-left','0').css('display', 'none');
                $img.eq(i).css('display', 'inline').css('transition-delay','1.25s');
                $img.eq(i + 1).css('margin-left','200px').css('display','inline').css('transition-delay','1.5s');
                $img.eq(i + 2).css('margin-left','400px').css('display','inline').css('transition-delay','1.75s');
                $img.eq(i + 3).css('margin-left','600px').css('display','inline').css('transition-delay','2s');
                slideImg();
            }, 4000);
        }
        slideImg();

        //si on clique sur « next » ou « > »
        $('.next').click(function () 
        {   // image suivante
            if (i < max-4) 
            {
                i+=4; // on incrémente le compteur
                $img.css('margin-left','0').css('display', 'none'); //on cache
                $img.eq(i).css('display', 'inline'); //on affiche l'image courante
                $img.eq(i+1).css('margin-left','200px').css('display', 'inline');
                $img.eq(i+2).css('margin-left','400px').css('display', 'inline');
                $img.eq(i+3).css('margin-left','600px').css('display', 'inline');
            }
        });
        //si on clique sur « prev » ou « < »
        $('.prev').click(function () 
        { // groupe des images précédentes
            
            if (i > 0) 
            {
                i-=4; // on décrémente le compteur
                $img.css('margin-left','0').css('display', 'none'); //on cache
                $img.eq(i).css('display', 'inline'); //on affiche l'image courante
                $img.eq(i+1).css('margin-left','200px').css('display', 'inline');
                $img.eq(i+2).css('margin-left','400px').css('display', 'inline');
                $img.eq(i+3).css('margin-left','600px').css('display', 'inline');
            } 
        });
    });
    </script>
    </head>
    <body>
        <div id="wrapper">
            <div id="titre">
                <h1>Proposition d'articles</h1>
            </div>
            <div id="carrousel">    
            <ul>
                <li><img src="<?php echo "$images[0]" ?>" width="120" height="100"></li>
                <li><img src="<?php echo "$images[1]" ?>" width="120" height="100"></li>
                <li><img src="<?php echo "$images[2]" ?>" width="120" height="100"></li>
                <li><img src="<?php echo "$images[3]" ?>" width="120" height="100"></li>
                <li><img src="<?php echo "$images[4]" ?>" width="120" height="100"></li>
                <li><img src="<?php echo "$images[5]" ?>" width="120" height="100"></li>
                <li><img src="<?php echo "$images[6]" ?>" width="120" height="100"></li>
                <li><img src="<?php echo "$images[7]" ?>" width="120" height="100"></li>
            </ul>
            </div>
            <div id="buttons">
                <input type="button" value="Precedent" class="prev">
                <input type="button" value="Suivant" class="next">
                <a href="catalogue magasin.php" class="access">Accéder au magasin</a>
            </div>
        </div>
    </body>
</html>