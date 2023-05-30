<?php
class abonneManager extends Manager
{

     /**
      * Fonction qui retourne tout les utilisateur dans un tableau 
      *
      * @return array
      */
    public function getUtilisateur():array
    {
        try {
            $typeAbonnement = new typeAbonementManager();
            $lesTypesAbonnement = $typeAbonnement->getList();
            $q = $this->getPDO()->prepare('SELECT * FROM abonne JOIN typeabonnement ON abonne.idTypeAbonnement=typeabonnement.idType');
            $q->execute();
            $r1 = $q->fetchAll(PDO::FETCH_ASSOC);

            $lesAbonnes = array();
            foreach ($r1 as $unABonnee) {
                $abonne = new abonne(
                    $unABonnee['id'],
                    $unABonnee['nom'],
                    $unABonnee['prenom'],
                    $unABonnee['adresse'],
                    $unABonnee['dateNaissance'],
                    $unABonnee['adresseEmail'],
                    $unABonnee['numeroTel'],
                    $unABonnee['dateAbonnement'],
                    $unABonnee['mdp'],
                    $lesTypesAbonnement[$unABonnee['idTypeAbonnement']]
                );
                $lesAbonnes[] = $abonne; // Ajoute l'abonné à l'array $lesAbonnes
                
            }
            
            return $lesAbonnes;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    /**
     * Fonction qui prend en paramètre un email et qui r'envoie l'utilisateur associé a cette email
     *
     * @param [String] $email
     * @return abonne
     */
    public function getUtilisateurByMail($email): abonne
    {

        try {
            $typeAbonnement = new typeAbonementManager();
            $lesTypesAbonnement = $typeAbonnement->getList();
            $q = $this->getPDO()->prepare('SELECT * FROM abonne JOIN typeabonnement ON abonne.idTypeAbonnement=typeabonnement.idType WHERE adresseEmail = :email');
            $q->bindParam(':email', $email, PDO::PARAM_STR);
            $q->execute();
            $unABonnee = $q->fetch(PDO::FETCH_ASSOC);


            $abonne = new abonne($unABonnee['id'], $unABonnee['nom'], $unABonnee['prenom'], $unABonnee['adresse'], $unABonnee['dateNaissance'], $unABonnee['adresseEmail'], $unABonnee['numeroTel'], $unABonnee['dateAbonnement'], $unABonnee['mdp'], $lesTypesAbonnement[$unABonnee['idTypeAbonnement']]);

            return $abonne;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    /**
     * Fonction qui prend en paramètre un id et qui r'envoie l'utilisateur associé a cette id
     *
     * @param [String] $id
     * @return abonne
     */
    public function getUtilisateurById($id): abonne
    {

        try {
            $typeAbonnement = new typeAbonementManager();
            $lesTypesAbonnement = $typeAbonnement->getList();
            $q = $this->getPDO()->prepare('SELECT * FROM abonne JOIN typeabonnement ON abonne.idTypeAbonnement=typeabonnement.idType WHERE id = :id');
            $q->bindParam(':id', $id, PDO::PARAM_STR);
            $q->execute();
            $unABonnee = $q->fetch(PDO::FETCH_ASSOC);



            $abonne = new abonne($unABonnee['id'], $unABonnee['nom'], $unABonnee['prenom'], $unABonnee['adresse'], $unABonnee['dateNaissance'], $unABonnee['adresseEmail'], $unABonnee['numeroTel'], $unABonnee['dateAbonnement'], $unABonnee['mdp'], $lesTypesAbonnement[$unABonnee['idTypeAbonnement']]);

            return $abonne;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
}
