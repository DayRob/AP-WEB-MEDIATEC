<?php

class LivreManager extends Manager
{
    /**
     * Renvoie un tableau associatif contenant l'ensemble des objets Livre
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
        
        $q = $this->getPDO()->prepare('SELECT * FROM document JOIN livre ON document.id = livre.idDocument ORDER BY titre');
        $q->execute();
        $r1 = $q->fetchAll(PDO::FETCH_ASSOC);
        
        $lesLivres = array();
        foreach($r1 as $livre)
        {
            if ($livre['commandeEnCours'] == null){
                $livre['commandeEnCours'] = false;
            }
            $lesLivres[$livre['id']] = new Livre($livre['id'], $livre['titre'], $livre['image'], $livre['commandeEnCours'], $lesPublics[$livre['idPublic']], $livre['ISBN'], $livre['auteur'],$livre['collection']);

            // on récupère la colection d'exemplaires de ce livre
            $q2 = $this->getPDO()->prepare('SELECT * FROM exemplaire WHERE idDocument = :id ORDER BY numero');
            $q2->bindParam(':id',  $livre['id'], PDO::PARAM_INT);
            $q2->execute();
            $r2 = $q2->fetchAll(PDO::FETCH_ASSOC);
            $lesExemplaires = array();
            foreach($r2 as $exemplaire)
            {
                $lesExemplaires[$exemplaire['numero']] = new Exemplaire($exemplaire['numero'], $lesLivres[$livre['id']] ,$exemplaire['dateAchat'],$lesRayons[$exemplaire['idRayon']],$lesEtats[$exemplaire['idEtat']]);
            }
            // on instancie la collection d'exemplaires dans l'objet livre
            $lesLivres[$livre['id']]->setlesExemplaires($lesExemplaires);

        }
        return $lesLivres;
    }

    /**
     * Renvoie l'objet Livre dont l'id correspond à la valeur du parametre $id
     *
     * @param integer $id
     * @return void
     */
    public function getLivreById(int $id) : Livre // récupère un objet Livre en fonction de son id
    {
        $catalogue = $this->getList();
        return $catalogue[$id];
    }

    /**
     * Renvoie un tableau associatif contenant l'ensemble des objets Livre dont les identifiants appartiennent au tableau d'entier $listeId
     *
     * @param array $listeId
     * @return void
     */
    public function getLivresByListId(array $listeId) : array 
    {
        $lesLivres = array();
        $catalogue = $this->getList();
        foreach($listeId as $id){
            $lesLivres[$id] = $catalogue[$id];
        }
        return $lesLivres;
    }

    /**
     * Renvoie un tableau associatif contenant l'ensemble des objets Livre dont le titre contient la chaine $texte
     *
     * @param string $texte
     * @return void
     */
    public function getLivreCritereSimple(string $texte) : array 
    {
        $q = $this->getPDO()->prepare('SELECT DISTINCT document.id FROM document JOIN livre ON document.id = livre.idDocument WHERE document.titre LIKE :texte');
        $q->bindValue(':texte',  "%".$texte."%", PDO::PARAM_STR);
        $q->execute();
        //$q->debugDumpParams();
        $r = $q->fetchAll(PDO::FETCH_ASSOC);
        $lesId = array();
        foreach($r as $livre){
            array_push($lesId, $livre['id']);
        }
        return $this->getLivresByListId($lesId);
    }

    /**
     * Renvoie un tableau associatif contenant l'ensemble des objets Livre dont la date d'achat date de moins de $nbJours jours
     *
     * @param integer $nbjours
     * @return array
     */
    public function getNouveautes(int $nbjours) : array
    {
        $q = $this->getPDO()->prepare('SELECT DISTINCT exemplaire.idDocument FROM exemplaire JOIN livre ON exemplaire.idDocument = livre.idDocument WHERE dateAchat > date_sub(now(), INTERVAL :nbjours DAY)');
        $q->bindParam(':nbjours',  $nbjours, PDO::PARAM_INT);
        $q->execute();
        $r = $q->fetchAll(PDO::FETCH_ASSOC);
        $lesId = array();
        foreach($r as $livre){
            array_push($lesId, $livre['idDocument']);
        }
        return $this->getLivresByListId($lesId);

    }

}

?>