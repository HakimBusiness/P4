<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/p4.css" title="Normal" />
	<title>Puissance 4</title>
    </head>
    <body>
	<div>
	<form action="index.php?url=p4" method="post">
	    Nom du joueur 1 :
	    <input type="text" name="nomj1" value=
	    <?php
		if (isset($_COOKIE["nomj1"])) {
		    echo '"'.$_COOKIE['nomj1'].'"';
		}
		else { echo '""'; }
	    ?>
	    />

	    <br/>

	    Nom du joueur 2 :
	    <input type="text" name="nomj2" value=
	    <?php
		if (isset($_COOKIE["nomj2"])) {
		    echo '"'.$_COOKIE['nomj2'].'"';
		}
		else { echo '""'; }
	    ?>
	    />

	    <br/>

	    <input type="submit" name="nomJoueur" value="Commencer" />
	</form>
	</div>
    </body>
</html>
