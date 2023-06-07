<?php

class HistoriqueManager extends Manager
{
    /**
     * Renvoie un tableau associatif contenant l'ensemble des objets Historique
     *
     * @return array
     */
    public function getList(): array
    {
        $q = $this->getPDO()->prepare('SELECT * FROM historique ORDER BY libelle');
        $q->execute();
        $r1 = $q->fetchAll(PDO::FETCH_ASSOC);

        $lesHistoriques = array();
        foreach ($r1 as $historique) {


            $lesHistoriques[$historique['id']] = new Historique($historique['id'], $historique['libelle'], $historique['date'], $historique['nbResultat'], $historique['requete']);
        }
        return $lesHistoriques;
    }

    public function creerHistorique($libelle, $nbResultat, $requete): void
    {
        try {
            $q = $this->getPDO()->prepare('INSERT INTO historique(libelle, datee, nbResultat, requete) VALUES(:libelle, NOW(), :nbResultat, :requete)');

            $q->bindParam(':libelle', $libelle, PDO::PARAM_STR);
            $q->bindParam(':datee', $date, PDO::PARAM_STR);
            $q->bindParam(':nbResultat', $nbResultat, PDO::PARAM_STR);
            $q->bindParam(':requete', $requete, PDO::PARAM_STR);
            $q->execute();
        } catch (PDOException $e) {
            print "Erreur !:" . $e->getMessage();
            die();
        }
    }
}
