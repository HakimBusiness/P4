<?php

    define("HAUT","6");
    define("LARG","7");

    session_start();

    // On recupere le nom des joueurs si on commence 
    // et on en profite pour envoyer un cookie pour se souvenir des noms
    if (isset($_POST["nomj1"])) {
	$_SESSION["nomj1"] = $_POST["nomj1"];
	setcookie("nomj1", $_POST["nomj1"], time()+12*24*3600); // expire dans 12 jours
    }

    if (isset($_POST["nomj2"])) {
    $_SESSION["nomj2"] = $_POST["nomj2"]; 
	setcookie("nomj2", $_POST["nomj2"], time()+12*24*3600); // expire dans 12 jours
    }

    // Dans le cas ou la session a expire, on reprend aussi les noms dans les cookies
    if (!isset($_SESSION["nomj1"])) {
	$_SESSION["nomj1"] = $_COOKIE["nomj1"];
    }

     if (!isset($_SESSION["nomj2"])) {
	$_SESSION["nomj2"] = $_COOKIE["nomj2"];
    }
    
    // on definie des noms de variables plus courts pour simplifier le code
    // mais il ne faut pas oublier de remettre a jour le tableau $_SESSION tout 
    // a la fin car c'est le seul conserve
    $board = $_SESSION["board"];
    $turn = $_SESSION["turn"];
    $j1 = $_SESSION["nomj1"];
    $j2 = $_SESSION["nomj2"];
    
    function init() {
	global $board;
	for ($col=0; $col<LARG; $col++) {
	    for ($row=0; $row<HAUT; $row++) {
		$board[$col][$row]=0;
	    }
	}
    }

    // Si la colonne est pleine, renvoie false. Joue le coup et renvoie true autrement.
    function play($col, $player) {
	global $board;
	$row = 0;
	$done = false;
	while ($row<HAUT) {
	    if ($board[$col][$row] == 0) {
		$board[$col][$row] = $player;
		$done=true;
		break;
	    } else {
		$row++;
	    }
	}
	return $done;
    }

    function print_line($row) {
	global $board;
	echo "<tr>\n";
	for ($col=0; $col<LARG; $col++) {
	    $case = $board[$col][$row];
	    echo '<td><img src="';
	    echo (($case == 0) ? "vide.png" : (($case == 1) ? "joueur1.png" : "joueur2.png"));
	    echo '" alt="';
	    echo (($case == 0) ? "0" : (($case == 1) ? "j1" : "j2"));
	    echo '" /></td>'; 
	}
	echo "\n</tr>\n";
    }

    // attention : pour faire plus joli, on nomme les colonnes de 1 a 7.
    // Il faut donc faire attention lorsque l'on recupere la valeur de la colonne jouee.
    function print_line_form() {
	echo '<tr class="lastline">'."\n";
	for ($col=0; $col<LARG; $col++) {
	    echo '<td><input type="submit" name="column" value="'.($col + 1).'" /></td>';
	}
	echo "\n</tr>\n";
    }

    function print_board() {
	echo '<form class="intable" action="p4.php" method="post">'."\n";
	echo '<table>'."\n";
	for ($row=(HAUT - 1); $row>=0; $row--){
		print_line($row);
	} 
	print_line_form();
	echo "</table>\n</form>\n";
    }

    // Les 2 fonctions suivantes permettent de verifier si le dernier coup etait gagnant
    function nb_align($posx, $posy, $dx, $dy) {
	global $board, $turn;
	if ($posx<0 || $posx>=LARG || $posy<0 || $posy>=HAUT) { 
	    return 0; 
	} else if ($board[$posx][$posy] == $turn)	{
	   return 1 + (nb_align($posx+$dx, $posy+$dy, $dx, $dy)); 
	} else{
		return 0;
	} 
    }

    function total_line($posx, $posy, $dx, $dy) {
	return 1 + nb_align($posx+$dx, $posy+$dy, $dx, $dy) + nb_align($posx-$dx, $posy-$dy, -$dx, -$dy);
    }
    
    function is_win() {
	global $board, $turn;
	$posx = $_POST["column"] - 1;
	// On doit maintenant retrouver la hauteur du dernier pion
	$row = HAUT - 1;
	while ($row>=0) {
	    if (!($board[$posx][$row] == 0)) {
		break;
	    } else {
		$row--;
	    }
	}
	$posy = $row;
	return((total_line($posx, $posy, 0, 1) >= 4) 
	    || (total_line($posx, $posy, 1, 0) >= 4) 
	    || (total_line($posx, $posy, 1, 1) >= 4) 
	    || (total_line($posx, $posy, -1, 1) >= 4));
    }

    // Si c'est la premi�re fois qu'on charge cette page, ou si on a explicitement 
    // demande a recommencer le jeu, on doit initialiser le plateau de jeu 
    // et c'est au joueur 1 de jouer
    if ((!isset($board))) {
		init();
		$turn = 1;
    }

    if(isset($_POST["clear"])){
    	if ($_POST["clear"]== "Recommencer") {
    		init();
			$turn = 1;
    	}  	
    }
    
?>
<!DOCTYPE html 
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<link rel="stylesheet" type="text/css" href="css/p4.css" title="Normal" />
	<title>Puissance 4</title>
    </head>
    <body>
	<div>
	<?php
	    if (isset($_POST["column"])) {
		// Si le coup est valide, il est joue, on verifie s'il est gagnant et on passe au tour suivant
		if (play(($_POST["column"] - 1), $turn)) {
		    if (is_win()) {
			echo "<b>".(($turn == 1) ? $j1 : $j2 )." a gagn� !</b><br />";
			$_SESSION["finish"] = true;
		    } else {
		    $turn=($turn%2) + 1;
		    }
		}
	    }
	    print_board();

	    echo "C'est � ".(($turn == 1)? $j1 : $j2).' (<img src="'.(($turn == 1)? "joueur1.png" : "joueur2.png" ).'" alt="pionJoueur" height="15">) de jouer.'."\n"
	?>

	<form action="p4.php" method="post">
	    <input type="submit" name="clear" value="Recommencer" />
	</form>
	
	<form action="index.php" method="post">
	    <input type="submit" value="Changer les noms" />
	</form>
	</div>
    </body>
</html>
<?php
    // Et on n'oublie pas de mette $_SESSION a jour
    $_SESSION["board"] = $board;
    $_SESSION["turn"] = $turn;
?>
