<?php


class Jeu_coup
{

    function play($col, $player) {
        //global $board;
        $row = 0;
        $done = false;
        while ($row<HAUT) {
            if ($GLOBALS["board"][$col][$row] == 0) {
                $GLOBALS["board"][$col][$row] = $player;
                $done=true;
                break;
            } else {
                $row++;
            }
        }
        return $done;
    }

}