<?php

class typeAbonementManager extends Manager
{
    /**
     * Renvoie un tableau associatif contenant l'ensemble des objets TypePublic
     *
     * @return array
     */
    public function getList() : array
    {
        $q = $this->getPDO()->prepare('SELECT * FROM typeabonnement');
        $q->execute();
        $r1 = $q->fetchAll(PDO::FETCH_ASSOC);
        
        $lestypes= array();
        foreach($r1 as $unType)
        {
            $lestypes[$unType['idType']] = new typeAbonnement($unType['idType'], $unType['libelle']);

        }
        return $lestypes;
    }

}

?>