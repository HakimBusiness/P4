<?php

class Coup_gagnant
{

    static function nb_align($posx, $posy, $dx, $dy) {
       // global $board, $turn;
        if ($posx<0 || $posx>=LARG || $posy<0 || $posy>=HAUT) {
            return 0;
        } else if ($GLOBALS["board"][$posx][$posy] == $GLOBALS["turn"])	{
            return 1 + (Coup_gagnant::nb_align($posx+$dx, $posy+$dy, $dx, $dy));
        } else{
            return 0;
        }
    }

    static function total_line($posx, $posy, $dx, $dy) {
        return 1 + Coup_gagnant::nb_align($posx+$dx, $posy+$dy, $dx, $dy) + Coup_gagnant::nb_align($posx-$dx, $posy-$dy, -$dx, -$dy);
    }

    function is_win($donnees) {
        //global $board, $turn;
        $posx = $donnees["column"] - 1;
        // On doit maintenant retrouver la hauteur du dernier pion
        $row = HAUT - 1;
        while ($row>=0) {
            if (!($GLOBALS["board"][$posx][$row] == 0)) {
                break;
            } else {
                $row--;
            }
        }
        $posy = $row;
        return((Coup_gagnant::total_line($posx, $posy, 0, 1) >= 4) || (Coup_gagnant::total_line($posx, $posy, 1, 0) >= 4)
                || (Coup_gagnant::total_line($posx, $posy, 1, 1) >= 4) || (Coup_gagnant::total_line($posx, $posy, -1, 1) >= 4));
    }


}