<?php

require_once ("BD.php");

class ModelGame
{

    public function is_exist($playerName)
    {

        $bdd = new BD();
        $connexion = $bdd->connect();
        $isExist = false;
        $requette = " SELECT NOM_JOUEUR FROM Resultat_Jeu ";
        $resultat = $connexion->query($requette) or die(print_r($connexion->errorInfo())) ;
        while ($data = $resultat->fetch())
        {
            if ( strcmp($playerName,$data["NOM_JOUEUR"])==0 )
            {
                $isExist = true;
                break;
            }
        }
        $bdd->deconnect();
        return $isExist;

    }

    public function createPlayer($playerName)
    {
        $result=false;
        $bdd = new BD();
        $connexion = $bdd->connect();
        $requette = " INSERT INTO Resultat_Jeu(NOM_JOUEUR) VALUES ('$playerName') ";
       if( $connexion->exec($requette) != null){$result=true;} else die(print_r($connexion->errorInfo()));
       
        $bdd->deconnect();
        return $result;
    }

    public function getPlayer($winnerName)
    {

        $id = 0;
        $bdd = new BD();
        $connexion = $bdd->connect();
        $requette = " SELECT ID FROM Resultat_Jeu WHERE NOM_JOUEUR='$winnerName' ";
        $resultat = $connexion->query($requette) or die(print_r($connexion->errorInfo())) ;
        if ($data = $resultat->fetch())
        {
            $id = $data["ID"];
        }
        $bdd->deconnect();
        return $id;

    }

    public function updateScore($winnerId)
    {
        $result=false;
        $bdd = new BD();
        $connexion = $bdd->connect();
        $requette = " SELECT SCORE FROM Resultat_Jeu WHERE ID='$winnerId' ";
        $resultat = $connexion->query($requette) or die(print_r($connexion->errorInfo())) ;
        if ($data = $resultat->fetch())
        {
            $score = $data["SCORE"];
            $newScore = $score + 1;
            $requette = " UPDATE Resultat_Jeu SET SCORE='$newScore' WHERE ID='$winnerId' ";
           if($connexion->exec($requette)!=null){$result=true;} else die(print_r($connexion->errorInfo())) ;
        }
        $bdd->deconnect();
         return $result;
    }

    public function getClassement()
    {

        $bdd = new BD();
        $connexion = $bdd->connect();
        $requette = " SELECT * FROM Resultat_Jeu ORDER BY SCORE DESC ";
        $resultat = $connexion->query($requette) or die(print_r($connexion->errorInfo())) ;
        $bdd->deconnect();
        return $resultat;

    }

}