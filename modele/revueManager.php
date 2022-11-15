<?php

class RevueManager extends Manager
{
    /**
     * Renvoie un tableau associatif contenant l'ensemble des objets Revue
     *
     * @return array
     */
    public function getList() : array
    {
        // recupération des états
        $etatManager = new EtatManager(); // Création d'un objet manager d'état
        $lesEtats = $etatManager->getList(); // chargement du dictionnaire des états
        
        $q = $this->getPDO()->prepare('SELECT * FROM revue ORDER BY titre');
        $q->execute();
        $r1 = $q->fetchAll(PDO::FETCH_ASSOC);
        
        $lesRevues = array();
        foreach($r1 as $revue)
        {
            $lesRevues[$revue['id']] = new Revue($revue['id'], $revue['titre'], $revue['empruntable']);
            // on récupère la collection de parutions de cette revue
            $q2 = $this->getPDO()->prepare('SELECT * FROM parution WHERE idRevue = :id ORDER BY numero');
            $q2->bindParam(':id',  $revue['id'], PDO::PARAM_INT);
            $q2->execute();
            $r2 = $q2->fetchAll(PDO::FETCH_ASSOC);
            $lesNumeros = array();
            foreach($r2 as $parution)
            {
                if ($parution['photo'] == null){
                    $parution['photo'] = "";
                }
                $lesNumeros[$parution['numero']] = new Parution($parution['numero'], $lesRevues[$revue['id']] ,$parution['dateParution'], $parution['photo'],$lesEtats[$parution['idEtat']]);
            }
            // on instancie la collection d'exemplaires dans l'objet livre
            $lesRevues[$revue['id']]->setlesNumeros($lesNumeros);

        }
        return $lesRevues;
    }

    /**
     * Renvoie l'objet Revue dont l'id correspond à la valeur du parametre $id
     *
     * @param integer $id
     * @return void
     */
    public function getRevueById(int $id) : Revue 
    {
        $catalogueRevue = $this->getList();
        return $catalogueRevue[$id];
    }

    /**
     * Renvoie un tableau associatif contenant l'ensemble des objets Revue dont les identifiants appartiennent au tableau d'entier $listeId
     *
     * @param array $listeId
     * @return void
     */
    public function getRevuesByListId(array $listeId) : array 
    {
        $lesRevues = array();
        $catalogueRevue = $this->getList();
        foreach($listeId as $id){
            $lesRevues[$id] = $catalogueRevue[$id];
        }
        return $lesRevues;
    }

    /**
     * Renvoie un tableau associatif contenant l'ensemble des objets Revue dont le titre contient la chaine $texte
     *
     * @param string $texte
     * @return void
     */
    public function getRevueCritereSimple(string $texte) : array 
    {
        $q = $this->getPDO()->prepare('SELECT DISTINCT id FROM revue WHERE revue.titre LIKE :texte');
        $q->bindValue(':texte',  "%".$texte."%", PDO::PARAM_STR);
        $q->execute();
        $r = $q->fetchAll(PDO::FETCH_ASSOC);
        $lesId = array();
        foreach($r as $revue){
            array_push($lesId, $revue['id']);
        }
        return $this->getRevuesByListId($lesId);
    }

    /**
     * Renvoie un tableau associatif contenant l'ensemble des objets Revue dont la date d'achat date de moins de $nbJours jours
     *
     * @param integer $nbjours
     * @return array
     */
    public function getNouveautes(int $nbjours) : array
    {
        // aller chercher les numéros des dernières parutions
        $q = $this->getPDO()->prepare('SELECT DISTINCT idRevue FROM parution WHERE dateParution > date_sub(now(), INTERVAL :nbjours DAY)');
        $q->bindParam(':nbjours',  $nbjours, PDO::PARAM_INT);
        $q->execute();
        $r = $q->fetchAll(PDO::FETCH_ASSOC);
        $lesId = array();
        foreach($r as $revue){
            array_push($lesId, $revue['idRevue']);
        }
        return $this->getRevuesByListId($lesId);

    }

}

?>