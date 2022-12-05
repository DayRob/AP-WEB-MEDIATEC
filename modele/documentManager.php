<?php
class DocumentManager extends Manager
{
    /**
     * Renvoie un tableau associatif contenant l'ensemble des objets Dvd
     *
     * @return array
     */
    public function getList() : array
    {
        // recupération des types de public
        $typePublicManager = new TypePublicManager(); // Création d'un objet manager de type de public
        $lesPublics = $typePublicManager->getList(); // chargement du dictionnaire des types de public
                
        $q = $this->getPDO()->prepare('SELECT * FROM document ORDER BY titre');
        $q->execute();
        $r1 = $q->fetchAll(PDO::FETCH_ASSOC);
        
        $lesDocuments = array();
        foreach($r1 as $doc)
        {
            
            
            $lesDocuments[$doc['id']] = new Document($doc['id'], $doc['titre'], $doc['image'], $doc['commandeEnCours'], $lesPublics[$doc['idPublic']]);

            

        }
        return $lesDocuments;
    }

     /**
     * Renvoie un tableau associatif contenant l'ensemble des objets Document dont les identifiants appartienent au tableau d'entier $listeId
     *
     * @param array $listeId
     * @return void
     */
    public function getDocumentByListId(array $listeId) : array 
    {
        $lesDocuments = array();
        $catalogue = $this->getList();
        foreach($listeId as $id){
            $lesDocuments[$id] = $catalogue[$id];
        }
        return $lesDocuments;
    }


    /**
     * Renvoie un tableau associatif contenant l'ensemble des objets Dvd dont le titre contient la chaine $texte
     *
     * @param string $titre
     * @return void
     */
    public function getDocumentByTitre(string $titre) : array
    {
        $q = $this->getPDO()->prepare('SELECT id FROM document WHERE titre LIKE :titre');
        $q->bindValue(':titre',  "%".$titre."%", PDO::PARAM_STR);
        $q->execute();
        //$q->debugDumpParams();
        $r = $q->fetchAll(PDO::FETCH_ASSOC);
        $lesId = array();
        foreach($r as $doc){
            array_push($lesId, $doc['id']);
        }
        return $this->getDocumentByListId($lesId);
    }

    /**
     * Renvoie un tableau associatif contenant l'ensemble des objets Dvd dont le titre contient la chaine $texte
     *
     * @param string $auteur
     * @return void
     */
    public function getDocumentByAuteur(string $auteur) : array
{
        $q = $this->getPDO()->prepare('SELECT id FROM document WHERE auteur LIKE :auteur');
        $q->bindValue(':auteur',  "%".$auteur."%", PDO::PARAM_STR);
        $q->execute();
        //$q->debugDumpParams();
        $r = $q->fetchAll(PDO::FETCH_ASSOC);
        $lesId = array();
        foreach($r as $doc){
            array_push($lesId, $doc['id']);
        }
        return $this->getDocumentByListId($lesId);
    }


    /**
     * Renvoie un tableau associatif contenant l'ensemble des objets Dvd dont le titre contient la chaine $texte
     *
     * @param string $descripteur
     * @return void
     */
    public function getDocumentBySujet(string $descripteur) : array
    {
        $q = $this->getPDO()->prepare('SELECT idDocument FROM descripteur WHERE libelle LIKE :descripteur');
        $q->bindValue(':descripteur',  "%".$descripteur."%", PDO::PARAM_STR);
        $q->execute();
        //$q->debugDumpParams();
        $r = $q->fetchAll(PDO::FETCH_ASSOC);
        $lesId = array();
        foreach($r as $desc){
            array_push($lesId, $desc['id']);
        }
        return $this->getDocumentByListId($lesId);
    }   
    
    
    /**
     * Renvoie un tableau associatif contenant l'ensemble des objets Dvd dont le titre contient la chaine $texte
     *
     * @param string $uneCollection
     * @return void
     */
    public function getDocumentByCollection(string $uneCollection) : array
    {
        $q = $this->getPDO()->prepare('SELECT id FROM livre WHERE collection LIKE :uneCollection');
        $q->bindValue(':uneCollection',  "%".$uneCollection."%", PDO::PARAM_STR);
        $q->execute();
        //$q->debugDumpParams();
        $r = $q->fetchAll(PDO::FETCH_ASSOC);
        $lesCollections = array();
        foreach($r as $coll){
            array_push($lesCollections, $coll['id']);
        }
        return $this->getDocumentByListId($lesCollections);
    }   

}

?>