<?php

class DocumentManager extends Manager{
    private $ListeDocument;
    
    /**

     * Renvoie un tableau associatif contenant l'ensemble des objets Dvd

     *

     * @return array

     */

     public function getList() : array

     {
 
         $livreManager = new LivreManager();
         $lesLivres = $livreManager->getList();
         $DvdManager = new DvdManager();
         $lesDvds = $DvdManager->getList();
         $lesDocuments = array_merge($lesLivres,$lesDvds);
         
         return $lesDocuments;
 
     }

     public function getDocumentById(string $idDocument)
     {
        
        $livreManager = new LivreManager();
        $lesLivres = $livreManager->getList();
        $DvdManager = new DvdManager();
        $lesDvds = $DvdManager->getList();
        $lesDocuments = array_merge($lesLivres,$lesDvds);
        foreach($lesDocuments as $unDocument)
        {            
            if($unDocument->getId() == $idDocument)
            {
                $leDocument = $unDocument;

            }   
        }
        return $leDocument;
     }
    
}

?>

