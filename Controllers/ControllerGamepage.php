<?php

class ControllerGamepage
{

    public function __construct($donnees)
    {

        require_once("Models/ModelGame.php");
        $modelGame = new ModelGame();

        //inscription des "NOUVEAUX" joueurs dans la base des donnees
        if (isset($donnees["nomj1"]) && isset($donnees["nomj2"])){

            $nom_joueur1 = $donnees["nomj1"];
            $nom_joueur2 = $donnees["nomj2"];

            if ( !($modelGame->is_exist($nom_joueur1)) ){
                $modelGame->createPlayer($nom_joueur1);
            }
            if ( !($modelGame->is_exist($nom_joueur2)) ){
                $modelGame->createPlayer($nom_joueur2);
            }

        }

        define("HAUT","6");
        define("LARG","7");

        session_start();

        if (isset($donnees["nomj1"])) {
            $_SESSION["nomj1"] = $donnees["nomj1"];
            setcookie("nomj1", $donnees["nomj1"], time()+12*24*3600); // expire dans 12 jours
        }

        if (isset($donnees["nomj2"])) {
            $_SESSION["nomj2"] = $donnees["nomj2"];
            setcookie("nomj2", $donnees["nomj2"], time()+12*24*3600); // expire dans 12 jours
        }

        if (!isset($_SESSION["nomj1"])) {
            $_SESSION["nomj1"] = $_COOKIE["nomj1"];
        }

        if (!isset($_SESSION["nomj2"])) {
            $_SESSION["nomj2"] = $_COOKIE["nomj2"];
        }

        $finish = false;
        $board = null;
        $turn = 1;

        if (!empty($_SESSION["board"])){
            $GLOBALS["board"] = $_SESSION["board"];
        }
        if (!empty($_SESSION["turn"])){
            $GLOBALS["turn"] = $_SESSION["turn"];
        }

        $j1 = $_SESSION["nomj1"];
        $j2 = $_SESSION["nomj2"];

        require_once("Services/Initialisation_plateau.php");
        require_once("Services/Jeu_coup.php");
        require_once("Services/Coup_gagnant.php");
        require_once("Services/Affichage_plateau.php");

        $initialisationPlateau = new Initialisation_plateau();
        $jeuCoup = new Jeu_coup();
        $coupGagnant = new Coup_gagnant();
        $affichagePlateau = new Affichage_plateau();

        if ((!isset($GLOBALS["board"]))) {
            $initialisationPlateau->init();
            $GLOBALS["turn"] = 1;
        }

        if(isset($donnees["clear"])){
            if ($donnees["clear"]== "Recommencer") {
                $initialisationPlateau->init();
                $GLOBALS["turn"] = 1;
            }
        }

        require_once("Views/gamePage.php");

        $_SESSION["board"] = $GLOBALS["board"];
        $_SESSION["turn"] = $GLOBALS["turn"];

    }

}