<?php


class BD
{
    public $server ;
    public $port ;
    public $base ;
    public $user ;
    public $password ;
    public $dsn;
    public $connexion;

    public function __construct()
    {
        $this->server = "localhost";
        $this->port = "8889";
        $this->base = "P4";
        $this->user = "root";
        $this->password = "root";
        $this->dsn = "mysql:host=".$this->server.";port=".$this->port.";dbname=".$this->base;
    }

    public function connect()
    {
        try
        {
            $this->connexion  = new PDO($this->dsn,$this->user,$this->password);
            //echo("Connexion réussie");
            $this->connexion->query("SET NAMES utf8");
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connexion;

        }
        catch  (PDOException $e )
        {
            echo("Erreur : " . $e ->getMessage() ) ;
        }
    }

    public function deconnect()
    {
        $this->connexion = null;
    }

}

?>