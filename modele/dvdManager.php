<?php

class DvdManager extends Manager
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
        // recupération des états
        $etatManager = new EtatManager(); // Création d'un objet manager d'état
        $lesEtats = $etatManager->getList(); // chargement du dictionnaire des états
        $rayonManager = new RayonManager(); // Création d'un objet manager de rayon
        $lesRayons = $rayonManager->getList(); // chargement du dictionnaire des états
        
        $q = $this->getPDO()->prepare('SELECT * FROM document JOIN dvd ON document.id = dvd.idDocument ORDER BY titre');
        $q->execute();
        $r1 = $q->fetchAll(PDO::FETCH_ASSOC);
        
        $lesDvd = array();
        foreach($r1 as $dvd)
        {
            if ($dvd['commandeEnCours'] == null){
                $dvd['commandeEnCours'] = false;
            }
            $lesDvd[$dvd['id']] = new Dvd($dvd['id'], $dvd['titre'], $dvd['image'], $dvd['commandeEnCours'], $lesPublics[$dvd['idPublic']], $dvd['synopsis'], $dvd['realisateur'],$dvd['duree']);

            // on récupère la colection d'exemplaires de ce livre
            $q2 = $this->getPDO()->prepare('SELECT * FROM exemplaire WHERE idDocument = :id ORDER BY numero');
            $q2->bindParam(':id',  $dvd['id'], PDO::PARAM_INT);
            $q2->execute();
            $r2 = $q2->fetchAll(PDO::FETCH_ASSOC);
            $lesExemplaires = array();
            foreach($r2 as $exemplaire)
            {
                $lesExemplaires[$exemplaire['numero']] = new Exemplaire($exemplaire['numero'], $lesDvd[$dvd['id']] ,$exemplaire['dateAchat'],$lesRayons[$exemplaire['idRayon']],$lesEtats[$exemplaire['idEtat']]);
            }
            // on instancie la collection d'exemplaires dans l'objet livre
            $lesDvd[$dvd['id']]->setlesExemplaires($lesExemplaires);

        }
        return $lesDvd;
    }

    /**
     * Renvoie l'objet Dvd dont l'id correspond à la valeur du parametre $id
     *
     * @param integer $id
     * @return void
     */
    public function getDvdById(int $id) : Livre
    {
        $catalogue = $this->getList();
        return $catalogue[$id];
    }

    /**
     * Renvoie un tableau associatif contenant l'ensemble des objets Dvd dont les identifiants appartienent au tableau d'entier $listeId
     *
     * @param array $listeId
     * @return void
     */
    public function getDvdByListId(array $listeId) : array 
    {
        $lesDvd = array();
        $catalogue = $this->getList();
        foreach($listeId as $id){
            $lesDvd[$id] = $catalogue[$id];
        }
        return $lesDvd;
    }

    /**
     * Renvoie un tableau associatif contenant l'ensemble des objets Dvd dont le titre contient la chaine $texte
     *
     * @param string $texte
     * @return void
     */
    public function getDvdCritereSimple(string $texte) : array
    {
        $q = $this->getPDO()->prepare('SELECT DISTINCT document.id FROM document JOIN dvd ON document.id = dvd.idDocument WHERE document.titre LIKE :texte');
        $q->bindValue(':texte',  "%".$texte."%", PDO::PARAM_STR);
        $q->execute();
        //$q->debugDumpParams();
        $r = $q->fetchAll(PDO::FETCH_ASSOC);
        $lesId = array();
        foreach($r as $dvd){
            array_push($lesId, $dvd['id']);
        }
        return $this->getDvdByListId($lesId);
    }

    /**
     * Renvoie un tableau associatif contenant l'ensemble des objets Dvd dont la date d'achat date de moins de $nbJours jours
     *
     * @param integer $nbjours
     * @return array
     */
    public function getNouveautes(int $nbjours) : array
    {
        $q = $this->getPDO()->prepare('SELECT DISTINCT exemplaire.idDocument FROM exemplaire JOIN dvd ON exemplaire.idDocument = dvd.idDocument WHERE dateAchat > date_sub(now(), INTERVAL :nbjours DAY)');
        $q->bindParam(':nbjours',  $nbjours, PDO::PARAM_INT);
        $q->execute();
        $r = $q->fetchAll(PDO::FETCH_ASSOC);
        $lesId = array();
        foreach($r as $dvd){
            array_push($lesId, $dvd['idDocument']);
        }
        return $this->getDvdByListId($lesId);

    }

}

?>