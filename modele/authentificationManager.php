<?php


class authentificationManager extends Manager
{
    public function login($mail, $mdp): void
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $abonneManger = new abonneManager();
        $leAbonne = $abonneManger->getUtilisateurByMail($mail);

        if ($leAbonne->getMdp() == $this->getHashmdp($mdp)) {
            $_SESSION["mail"] = $leAbonne->getAdresseMail();
            $_SESSION["mdp"] = $leAbonne->getMdp();
        }
    }



    private function getHashmdp(string $mdp): string
    {
        $q = $this->getPDO()->prepare('SELECT PASSWORD(:mdp) as hash');
        $q->bindparam(':mdp',  $mdp , PDO::PARAM_STR);
        $q->execute();
        //$q->debugDumpParams();
        $r = $q->fetch(PDO::FETCH_ASSOC);
        return $r['hash'];
    }

    public function isLoggedOn(): bool
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $ret = false;

        if (isset($_SESSION["mail"])) {
            $abonneManger = new abonneManager();
            $leAbonne = $abonneManger->getUtilisateurByMail($_SESSION["mail"]);

            if (
                $leAbonne->getAdresseMail() == $_SESSION["mail"] && $leAbonne->getMdp() == $_SESSION["mdp"]
            ) {
                $ret = true;
            }
        }
        return $ret;
    }


    public function infoAbonne(): abonne
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        if (isset($_SESSION["mail"])) {
            $abonneManger = new abonneManager();
            $leAbonne = $abonneManger->getUtilisateurByMail($_SESSION["mail"]);
        }
        return $leAbonne;
    }

    public function logout(): void
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        unset($_SESSION["mail"]);
        unset($_SESSION["mdp"]);
    }


    /**
     * function qui permet de changer le mdp d'un abonné
     *
     * @param [type] $id
     * @param [type] $mdp
     * @return void
     */
    public function ModifierMdp($id,$mdp):void
    {
        $mdp=$this->getHashmdp($mdp);
        try {
            $q = $this->getPDO()->prepare('UPDATE abonne SET mdp = :mdp WHERE id = :id');
            $q->bindParam(':mdp',$mdp, PDO::PARAM_STR);
            $q->bindParam(':id',$id, PDO::PARAM_STR);
            $q->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }

    }

    public function ModifierIfo($id,$nom,$prenom,$adresse,$DateNaissance,$numeroTel,):void
    {
        
        try {
            $q = $this->getPDO()->prepare('UPDATE abonne SET nom = :nom, prenom = :prenom, adresse = :adresse, dateNaissance = :dateNaissance, numeroTel = :numeroTel WHERE id = :id');
            $q->bindParam(':nom',$nom, PDO::PARAM_STR);
            $q->bindParam(':prenom',$prenom, PDO::PARAM_STR);
            $q->bindParam(':adresse',$adresse, PDO::PARAM_STR);
            $q->bindParam(':dateNaissance',$DateNaissance, PDO::PARAM_STR);
            $q->bindParam(':numeroTel',$numeroTel, PDO::PARAM_STR);
            $q->bindParam(':id',$id, PDO::PARAM_STR);
            $q->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }

    }


    public function verifNouveauMdp($nouveaumdp, $verifNouveaumdp):bool
    {
        if($nouveaumdp == $verifNouveaumdp)
        {
            return true;
        }
        else
        {
            return false;
        }
    }



    


}
