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

}

?>