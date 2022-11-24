<?php


class authentificationManager extends Manager
{
    public function login($mail, $mdp):void
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $abonneManger = new abonneManager();
        $leAbonne = $abonneManger->getUtilisateurByMail($mail);

        if ($leAbonne->getMdp() == $mdp) {
            $_SESSION["mail"] = $leAbonne->getAdresseMail();
            $_SESSION["mdp"] = $leAbonne->getMdp();
        }
    }

   public function isLoggedOn():bool
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


    public function infoAbonne():abonne
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

   public function logout():void
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        
        unset($_SESSION["mail"]);
        unset($_SESSION["mdp"]);
    }





    // if (trim($leAbonne->getMdp()) == trim(crypt($mdp, $leAbonne->getMdp()))) {
    //     // le mot de passe est celui de l'utilisateur dans la base de donnees
    //     $_SESSION["mailU"] = $mail;
    //     $_SESSION["mdpU"] = $mdpBD;
    //     $_SESSION["roleU"] = $util["roleU"];
    // }


}
