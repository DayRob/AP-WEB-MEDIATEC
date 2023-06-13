<?php

class exemplaireManager extends Manager{

    public function getListByDocument(string $idDoc) : array 
    {
        try{
            $document = new documentManager();
            $leDocument = $document->getList();
            $etatManager = new EtatManager(); // Création d'un objet manager d'état
            $lesEtats = $etatManager->getList(); // chargement du dictionnaire des états
            $rayonManager = new RayonManager(); // Création d'un objet manager de rayon
            $lesRayons = $rayonManager->getList(); // chargement du dictionnaire des états

            $q = $this->getPDO()->prepare('SELECT * FROM exemplaire e JOIN document d ON d.id = e.idDocument JOIN rayon r ON r.id = e.idRayon JOIN etat et ON et.id = e.idEtat JOIN livre l ON l.idDocument = d.id WHERE e.idDocument = d.id');
            $q->execute();
            $r1 = $q->fetchAll(PDO::FETCH_ASSOC);

            $lesExemplaires = array();

            foreach ($r1 as $unExemplaire){
                $lesExemplaires[$unExemplaire['numero']] = new Exemplaire($leDocument[$unExemplaire['idDocument']], $unExemplaire['numero'], $unExemplaire['dateAchat'], $lesRayons[$unExemplaire['idRayon']], $lesEtats[$unExemplaire['idEtat']]);
                
            }
            return $lesExemplaires;
        }
        catch(PDOException $e) {
            print "Erreur !:" . $e->getMessage();
            die();
        }
    }


    public function getExemplaireById(string $numero, string $idDoc) : Exemplaire
    {
        $lesExemplaires = $this->getListByDocument($idDoc);
        foreach($lesExemplaires as $unExemplaire)
       {
           if($unExemplaire->getLeNumero() == $numero)
           {
               $lExemplaire = $unExemplaire;

           }
       
        }
       return $lExemplaire;
       
        
    }
    
    
    public function setRerservation($idAbonne, $idDocument) : void 
    {
        try{
            $idAbonne = $_SESSION["id"];
            $q = $this->getPDO()->prepare('INSERT INTO reservation(id, id_abonne, id_document) VALUES (:idAbonne, :idDocument)');
            $q->bindParam(':idAbonne', $idAbonne, PDO::PARAM_INT);
            $q->bindParam(':idDocuement', $idDocument, PDO::PARAM_INT);
            
        }
        catch(PDOException $e) {

        }    
    }
        
    }


?>