<?php
class abonneManager extends Manager
{

    public function getUtilisateur(): array{

        try {
            $typeAbonnement = new typeAbonementManager();
            $lesTypesAbonnement = $typeAbonnement->getList();
            $q = $this->getPDO()->prepare('SELECT * FROM abonne JOIN typeabonnement ON abonne.idTypeAbonnement=typeabonnement.idType');
            $q->execute();
            $r1 = $q->fetchAll(PDO::FETCH_ASSOC);

            $lesAbonnes = array();
            foreach ($r1 as $unABonnee) {

                $lesAbonnes[$unABonnee['id']] = new abonne($unABonnee['id'], $unABonnee['nom'], $unABonnee['prenom'], $unABonnee['adresse'], $unABonnee['dateNaissance'], $unABonnee['adresseEmail'], $unABonnee['numeroTel'],$unABonnee['dateAbonnement'],$unABonnee['mdp'], $lesTypesAbonnement[$unABonnee['idTypeAbonnement']]);
            }
            return $lesAbonnes;
        } 
        catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function getUtilisateurByMail($email):abonne{

        try {
            $typeAbonnement = new typeAbonementManager();
            $lesTypesAbonnement = $typeAbonnement->getList();
            $q = $this->getPDO()->prepare('SELECT * FROM abonne JOIN typeabonnement ON abonne.idTypeAbonnement=typeabonnement.idType WHERE adresseEmail = :email');
            $q->bindParam(':email',$email, PDO::PARAM_STR);
            $q->execute();
            $unABonnee = $q->fetch(PDO::FETCH_ASSOC);

            $abonne = new abonne($unABonnee['id'], $unABonnee['nom'], $unABonnee['prenom'], $unABonnee['adresse'], $unABonnee['dateNaissance'], $unABonnee['adresseEmail'], $unABonnee['numeroTel'],$unABonnee['dateAbonnement'],$unABonnee['mdp'], $lesTypesAbonnement[$unABonnee['idTypeAbonnement']]);

            return $abonne;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }

    }
}
