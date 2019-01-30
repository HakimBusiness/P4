<?php


class Affichage_par_ligne
{

    function print_line($row) {
        //global $board;
        echo "<tr>\n";
        for ($col=0; $col<LARG; $col++) {
            $case = $GLOBALS["board"][$col][$row];
            echo '<td><img src="';
            echo (($case == 0) ? "Images/vide.png" : (($case == 1) ? "Images/joueur1.png" : "Images/joueur2.png"));
            echo '" alt="';
            echo (($case == 0) ? "0" : (($case == 1) ? "j1" : "j2"));
            echo '" /></td>';
        }
        echo "\n</tr>\n";
    }

    function print_line_form() {
    echo '<tr class="lastline">'."\n";
    for ($col=0; $col<LARG; $col++) {
        echo '<td><input type="submit" name="column" value="'.($col + 1).'"  /></td>';
    }
    echo "\n</tr>\n";
    }

    function print_line_form_finish() {
        echo '<tr class="lastline">'."\n";
        for ($col=0; $col<LARG; $col++) {
            echo '<td><input type="submit" name="column" value="'.($col + 1).'" disabled /></td>';
        }
        echo "\n</tr>\n";
    }

}