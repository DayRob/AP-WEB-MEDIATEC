<?php
class abonneManager extends Manager{

    public function getList() : array{
        {
            $q = $this->getPDO()->prepare('SELECT * FROM abonnee');
            $q->execute();
            $r1 = $q->fetchAll(PDO::FETCH_ASSOC);
            
            $lesAbonnes = array();
            foreach($r1 as $unABonnee)
            {
                $lesPublics[$unABonnee['id']] = new TypePublic($unABonnee['id'], $unABonnee['libelle']);
    
            }
            return $lesPublics;
        }
    }

}
?>