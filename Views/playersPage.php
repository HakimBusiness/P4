<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/p4.css" title="Normal" />
	<title>Puissance 4</title>
    </head>
    <body>
	<div>
	<form action="index.php?url=gamepage" method="post">
	    Nom du joueur 1 :
	    <input type="text" name="nomj1" value=
	    <?php
		if (isset($_COOKIE["nomj1"])) {
		    echo '"'.$_COOKIE['nomj1'].'"';
		}
		else { echo '""'; }
	    ?> required
	    />

	    <br/>

	    Nom du joueur 2 :
	    <input type="text" name="nomj2" value=
	    <?php
		if (isset($_COOKIE["nomj2"])) {
		    echo '"'.$_COOKIE['nomj2'].'"';
		}
		else { echo '""'; }
	    ?> required
        />

	    <br/>

	    <input type="submit" name="nomJoueur" value="Commencer" />

	</form>

        <br/>

        <a href="index.php?url=classement"> <input type="button" name="btnClassement" value="Classement des joueurs" /> </a>

	</div>
    </body>
</html>
