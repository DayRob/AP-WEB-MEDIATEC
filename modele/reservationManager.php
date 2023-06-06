<?php
class reservationManager extends Manager{

    public function setRerservation($idAbonne, $idDocument, $idExemplaire) : void 
    {
        try{
            $q = $this->getPDO()->prepare('INSERT INTO reservation(id_abonne, id_document, id_exemplaire) VALUES (:idAbonne, :idDocument, :idExemplaire)');
            $q->bindParam(':idAbonne', $idAbonne, PDO::PARAM_INT);
            $q->bindParam(':idDocument', $idDocument, PDO::PARAM_INT);
            $q->bindParam(':idExemplaire', $idExemplaire, PDO::PARAM_INT);
            $q->execute();
            
        }
        catch(PDOException $e) {
            var_dump("null");
        }    

    }   

    public function getReservationAbonne($idAbonne)
    {
        try {
            $q = $this->getPDO()->prepare('SELECT id, id_abonne, id_document, id_exemplaire FROM reservation WHERE id_abonne = :idabonne');
            $q->bindParam(':idabonne', $idAbonne, PDO::PARAM_INT);
            $q->execute();
            $r1 = $q->fetchAll(PDO::FETCH_ASSOC);
           
            $lesRerservation = array();
            foreach ($r1 as $uneReservation) {
                $unAbonne = new abonneManager();
                $unDocument = new DocumentManager();
                $unExemplaire = new exemplaireManager();
                $unAbonne= $unAbonne->getUtilisateurById($uneReservation['id_abonne']);
                $unDocument = $unDocument->getDocumentById($uneReservation['id_document']);
                $unExemplaire = $unExemplaire->getExemplaireById($uneReservation['id_exemplaire']);
                $reservation = new reservation (
                    $uneReservation['id'],
                    $unAbonne,
                    $unDocument,
                    $unExemplaire
                );
                $lesRerservation[] = $reservation; // Ajoute l'emprunt à l'array $lesEmprunts
                
            } 
            return $lesRerservation;
        }       
        catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function getNumberReservation($idAbonne)
    {
        $q = $this->getPDO()->prepare('SELECT COUNT(*) FROM reservation WHERE id_abonne = :idabonne');
        $q->bindParam(':idabonne', $idAbonne, PDO::PARAM_INT);
        $q->execute();
        $resultat = $q->fetchColumn();
        return $resultat; 
    }
} 

?>