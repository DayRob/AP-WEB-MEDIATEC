<?php

class EtatManager extends Manager
{
    /**
     * Renvoie un tableau associatif contenant l'ensemble des objets Etat
     *
     * @return array
     */
    public function getList() : array
    {
        $q = $this->getPDO()->prepare('SELECT * FROM etat');
        $q->execute();
        $r1 = $q->fetchAll(PDO::FETCH_ASSOC);
        
        $lesEtats = array();
        foreach($r1 as $unEtat)
        {
            $lesEtats[$unEtat['id']] = new Etat($unEtat['id'], $unEtat['libelle']);

        }
        return $lesEtats;
    }

    public function getEtatByExemplaire(int $id, int $doc) : Etat {
        $q = $this->getPDO()->prepare('SELECT * FROM `etat` JOIN exemplaire ON exemplaire.idEtat = etat.id WHERE exemplaire.numero = :num AND exemplaire.idDocument = :idDoc ');
        $q->bindParam(':num', $id, PDO::PARAM_INT);
        $q->bindParam(':idDoc', $doc, PDO::PARAM_INT);
        $q->execute();

        $unEtat = $q->fetch(PDO::FETCH_ASSOC);
        $etat = new Etat ($unEtat['id'], $unEtat['libelle']);
        return $etat;

    }   

}

?>