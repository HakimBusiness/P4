<?php

class Affichage_plateau
{

    function print_board($finish)
    {

        require_once("Services/Affichage_par_ligne.php");
        $affichageParLigne = new Affichage_par_ligne();

        echo '<form class="intable" action="index.php?url=gamepage" method="post">' . "\n";
        echo '<table>' . "\n";
        for ($row = (HAUT - 1); $row >= 0; $row--) {
            $affichageParLigne->print_line($row);
        }
        if($finish == true){
            $affichageParLigne->print_line_form_finish();
        }
        else{
            $affichageParLigne->print_line_form();
        }
        echo "</table>\n</form>\n";
    }

}