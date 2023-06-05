<?php

class Emprunt {
    private  $idEmprunt;
    private  $Abonne ;
    private  $Document;
    private  $dateDebut;
    private  $dateFin;
    private  bool $prolongeable;

    /**
     * Coonstructeru de la classe emprunt
     *
     * @param integer $unIdEmprunt
     * @param Abonne $unIdAbonne
     * @param Document $unIdDocument
     * @param string $uneDateDebut
     * @param string $uneDateFin
     * @param boolean $estProlongeable
     */
    public function __construct(int $unIdEmprunt, abonne $unAbonne,Document $unDocument, string $uneDateDebut, string $uneDateFin, bool $estProlongeable )
    {
        $this->idEmprunt = $unIdEmprunt;
        $this->Abonne = $unAbonne;
        $this->Document = $unDocument;
        $this->dateDebut = $uneDateDebut;
        $this->dateFin = $uneDateFin;
        $this->prolongeable = $estProlongeable;
        
    }

    /**
     * Get the value of idEmprunt
     */ 
    public function getIdEmprunt()
    {
        return $this->idEmprunt;
    }

    

    /**
     * Get the value of dateDebut
     */ 
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Get the value of dateFin
     */ 
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Get the value of prolongeable
     */ 
    public function getProlongeable()
    {
        return $this->prolongeable;
    }

    /**
     * Get the value of Abonne
     */ 
    public function getAbonne()
    {
        return $this->Abonne;
    }

    /**
     * Get the value of Document
     */ 
    public function getDocument()
    {
        return $this->Document;
    }
}
    
   
?>