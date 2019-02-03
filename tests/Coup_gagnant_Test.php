<?php
define("HAUT","6");
define("LARG","7");
$board=array();
for ($col=0; $col<LARG; $col++) {
    for ($row=0; $row<HAUT; $row++) {
        $board[$col][$row]=0;
    }
}
$turn=1;
$board[0][1]=0;
$board[1][1]=$turn;
$board[2][1]=0;
$donnees["column"]=2;
require_once("Services/Coup_gagnant.php");
require dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

use PHPUnit\Framework\TestCase;
class Affichage_par_ligne_Test extends TestCase
{
    public function test_nb_align()
    {
        
       $Coup=new Coup_gagnant();


       $this->assertEquals(
        0,
        $Coup->nb_align(-1,1,0,0),
        "it should return 0 if posx<0 ou posx>=LARG ou posy<0 ou posy>=HAUT !"
       );
       
       $this->assertEquals(
        1,
        $Coup->nb_align(1,1,1,0),
        "it should return 1 if board[posx][posy]==turns!"
       );

       
       
    }

    public function test_total_line()
    {

        $Coup=new Coup_gagnant();
        $this->assertEquals(
            1,
            $Coup->total_line(1,1,1,0),
            "it should return 1 "
           );
    }

    public function test_is_win()
    {
        $Coup=new Coup_gagnant();
        $this->assertEquals(
            false,
            $Coup->is_win($GLOBALS["donnees"]),
            "it should return false  "
           );
    }

}