<?php

class TypePublicManager extends Manager
{
    /**
     * Renvoie un tableau associatif contenant l'ensemble des objets TypePublic
     *
     * @return array
     */
    public function getList() : array
    {
        $q = $this->getPDO()->prepare('SELECT * FROM public');
        $q->execute();
        $r1 = $q->fetchAll(PDO::FETCH_ASSOC);
        
        $lesPublics = array();
        foreach($r1 as $unPublic)
        {
            $lesPublics[$unPublic['id']] = new TypePublic($unPublic['id'], $unPublic['libelle']);

        }
        return $lesPublics;
    }

}

?>