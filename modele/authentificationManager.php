<?php


class authentificationManager extends Manager
{
    /**
     * Fonction qui permet de crée une session en prenant en paramètre un login et un mdp
     *
     * @param [String] $mail
     * @param [String] $mdp
     * @return void
     */
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
            $_SESSION["id"] = $leAbonne->getId();
        }
    }



    /**
     * Fonction qui permet de récuperer le mdp hasher
     *
     * @param string $mdp
     * @return string
     */
    private function getHashmdp(string $mdp): string
    {
        $q = $this->getPDO()->prepare('SELECT PASSWORD(:mdp) as hash');
        $q->bindparam(':mdp',  $mdp, PDO::PARAM_STR);
        $q->execute();

        $r = $q->fetch(PDO::FETCH_ASSOC);
        return $r['hash'];
    }

    /**
     * Fonction qui permet de vérifier si un utilisateur est connecter et r'envoie true ou false
     *
     * @return boolean
     */
    public function isLoggedOn(): bool
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $ret = false;

        if (isset($_SESSION["id"])) {
            $abonneManger = new abonneManager();
            $leAbonne = $abonneManger->getUtilisateurById($_SESSION["id"]);

            if (
                $leAbonne->getId() == $_SESSION["id"] && $leAbonne->getMdp() == $_SESSION["mdp"]
            ) {
                $ret = true;
            }
        }
        return $ret;
    }


    /**
     * Fonction qui permet de r'envoier les infos d'un abonne connecter
     *
     * @return abonne
     */
    public function infoAbonne(): abonne
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        if (isset($_SESSION["id"])) {
            $abonneManger = new abonneManager();
            $leAbonne = $abonneManger->getUtilisateurById($_SESSION["id"]);
        }
        return $leAbonne;
    }

    /**
     * FOnction qui permet de ce déconnecter et donc de désactiver la session
     *
     * @return void
     */
    public function logout(): void
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        unset($_SESSION["id"]);
    }

    


    /**
     * function qui permet de changer le mdp d'un abonné
     *
     * @param [type] $id
     * @param [type] $mdp
     * @return void
     */
    public function ModifierMdp($id, $mdp): void
    {
        $mdp = $this->getHashmdp($mdp);
        try {
            $q = $this->getPDO()->prepare('UPDATE abonne SET mdp = :mdp WHERE id = :id');
            $q->bindParam(':mdp', $mdp, PDO::PARAM_STR);
            $q->bindParam(':id', $id, PDO::PARAM_STR);
            $q->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    /**
     * Fonction qui permet de changer les Infos d'un abonne
     *
     * @param [String] $id
     * @param [String] $nom
     * @param [String] $prenom
     * @param [String] $adresse
     * @param [String] $DateNaissance
     * @param [String] $adresseEmail
     * @param [String] $numeroTel
     * @return void
     */
    public function ModifierInfo($id, $nom, $prenom, $adresse, $DateNaissance, $adresseEmail, $numeroTel): void
    {

        try {
            $q = $this->getPDO()->prepare('UPDATE abonne SET nom = :nom, prenom = :prenom, adresse = :adresse, dateNaissance = :dateNaissance,adresseEmail = :adresseEmail, numeroTel = :numeroTel WHERE id = :id');
            $q->bindParam(':nom', $nom, PDO::PARAM_STR);
            $q->bindParam(':prenom', $prenom, PDO::PARAM_STR);
            $q->bindParam(':adresse', $adresse, PDO::PARAM_STR);
            $q->bindParam(':dateNaissance', $DateNaissance, PDO::PARAM_STR);
            $q->bindParam(':adresseEmail', $adresseEmail, PDO::PARAM_STR);
            $q->bindParam(':numeroTel', $numeroTel, PDO::PARAM_STR);
            $q->bindParam(':id', $id, PDO::PARAM_STR);
            $q->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }


    /**
     * permet de vérifier si les deux chaines de caractères correpond et r'envoie true si c'est     le cas
     *
     * @param [String] $nouveaumdp
     * @param [String] $verifNouveaumdp
     * @return boolean
     */
    public function verifNouveauMdp($nouveaumdp, $verifNouveaumdp): bool
    {
        if ($nouveaumdp == $verifNouveaumdp) {
            return true;
        } else {
            return false;
        }
    }
}
