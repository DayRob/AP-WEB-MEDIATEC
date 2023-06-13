<?php

class HistoriqueManager extends Manager
{
    /**
     * Renvoie un tableau associatif contenant l'ensemble des objets Historique
     *
     * @return array
     */
    public function getList()
    {
        try {
            $q = $this->getPDO()->prepare('SELECT * FROM historique');
            $q->execute();

            $results = $q->fetchAll(PDO::FETCH_ASSOC);

            // Convertir chaque ligne en objet historique
            $historiques = [];
            foreach ($results as $row) {

                $historique = new historique($row['id'], $row['libelle'], $row['date'], $row['nbResultat'], $row['requete']);

                $historiques[] = $historique;
            }
            return $historiques;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }




    /**
     * créer un enregistrement dans la table historique
     *
     * @param string $libelle
     * @param int $nbResultat
     * @param string $requete
     * @return void
     */
    public function creerHistorique($libelle, $nbResultat, $requete): void
    {
        try {
            $q = $this->getPDO()->prepare('INSERT INTO historique(libelle, nbResultat, requete) VALUES(:libelle, :nbResultat, :requete)');

            $q->bindParam(':libelle', $libelle, PDO::PARAM_STR);
            $q->bindParam(':nbResultat', $nbResultat, PDO::PARAM_STR);
            $q->bindParam(':requete', $requete, PDO::PARAM_STR);

            $q->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
}
