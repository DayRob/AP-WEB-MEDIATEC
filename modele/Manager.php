<?php

class Manager 
{
    /**
     * Etablit la connexion au serveur de base de données
     *
     * @return void
     */
    protected function dbConnect()
    {
        $login = "root";
        $mdp = "";
        $bd = "mediateq";
        $serveur = "localhost";

        try
        {
            $conn = new PDO("mysql:host=$serveur;dbname=$bd", $login, $mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')); 
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } 
        catch (PDOException $e) 
        {
            print "Erreur de connexion PDO ";
            die();
        }
    }

    /**
     * Renvoie l'objet PDO courant s'il existe ou en instancie un nouveau sinon (pattern singleton)
     *
     * @return void
     */
    protected function getPDO() 
    {
        static $pdo = null;
        if ($pdo == null) {
            $pdo = $this->dbConnect();
        }
        return $pdo;
    }
    
}

?>