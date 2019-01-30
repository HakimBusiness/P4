<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/p4.css" title="Normal" />
    <title>Puissance 4</title>
</head>
<body>
<div>
    <?php
    if (isset($donnees["column"])) {
        // Si le coup est valide, il est joue, on verifie s'il est gagnant et on passe au tour suivant
        if ($jeuCoup->play(($donnees["column"] - 1), $GLOBALS["turn"])) {
            if ($coupGagnant->is_win($donnees)) {
                echo "<b>".(($GLOBALS["turn"] == 1) ? $j1 : $j2 )." a gagné !</b><br />";
                $GLOBALS["finish"] = true;
            } else {
                $GLOBALS["turn"]=($GLOBALS["turn"]%2) + 1;
            }
        }
    }
    if (!empty($GLOBALS["finish"])){
        $affichagePlateau->print_board($GLOBALS["finish"]);
    }
    else{
        $affichagePlateau->print_board(false);
    }

    echo "C'est à ".(($GLOBALS["turn"] == 1)? $j1 : $j2).' (<img src="'.(($GLOBALS["turn"] == 1)? "Images/joueur1.png" : "Images/joueur2.png" ).'" alt="pionJoueur" height="15">) de jouer.'."\n"
    ?>

    <form action="index.php?url=gamepage" method="post">
        <input type="submit" name="clear" value="Recommencer" />
    </form>

    <form action="index.php" method="post">
        <input type="submit" value="Changer les noms" />
    </form>
</div>
</body>
</html>