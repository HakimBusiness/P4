<?php

require_once("Models/ModelGame.php");

class ControllerClassement
{

    public function __construct($donnees)
    {

        $modelGame = new ModelGame();
        $resultat = $modelGame->getClassement();

        require_once("Views/classementPage.php");


    }

}