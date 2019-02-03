<?php

class Initialisation_plateau
{
   
    function init() {
        //global $board;
        for ($col=0; $col<LARG; $col++) {
            for ($row=0; $row<HAUT; $row++) {
                $GLOBALS["board"][$col][$row]=0;
            }
        }
    }

}