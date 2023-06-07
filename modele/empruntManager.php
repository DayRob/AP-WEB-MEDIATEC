<?php

class EmpruntManager extends Manager{

    public function getEmrpuntAbonne($idAbonne)
    {
        try {
            $q = $this->getPDO()->prepare('SELECT idEmprun,idAbonne,idDocument,dateDebut,dateFin,prolongeable FROM emprunt WHERE idAbonne = :idabonne');
            $q->bindParam(':idabonne', $idAbonne, PDO::PARAM_INT);
            $q->execute();
            $r1 = $q->fetchAll(PDO::FETCH_ASSOC);
           
            $lesEmprunts = array();
            foreach ($r1 as $unEmprunts) {
                $unAbonne = new abonneManager();
                $unDocument = new DocumentManager();
                $unAbonne= $unAbonne->getUtilisateurById($unEmprunts['idAbonne']);
                $unDocument = $unDocument->getDocumentById($unEmprunts['idDocument']);
                $emprunt = new Emprunt(
                    $unEmprunts['idEmprun'],
                    $unAbonne,
                    $unDocument,
                    $unEmprunts['dateDebut'],
                    $unEmprunts['dateFin'],
                    $unEmprunts['prolongeable'],
                   
                );
                $lesEmprunts[] = $emprunt; // Ajoute l'emprunt à l'array $lesEmprunts
                
            }
            
            return $lesEmprunts;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }

    }

    public function getNumberEmprunt($idAbonne)
    {
        $q = $this->getPDO()->prepare('SELECT COUNT(*) FROM emprunt WHERE idAbonne = :idabonne');
        $q->bindParam(':idabonne', $idAbonne, PDO::PARAM_INT);
        $q->execute();
        $resultat = $q->fetchColumn();
        return $resultat; 
    }
}
