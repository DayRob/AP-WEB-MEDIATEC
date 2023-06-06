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

}
    

?>