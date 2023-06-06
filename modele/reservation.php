<?php

class reservation {
    private int $id;
    private Abonne $Abonne;
    private Document $document;
    private Exemplaire $exemplaire ;

    public function __construct(int $id, Abonne $Abonne, Document $Document, Exemplaire $Exemplaire)
    {
        $this->id = $id;
        $this->Abonne = $Abonne;
        $this->document = $Document;
        $this->exemplaire = $Exemplaire;
    }

    public function getId() : int {
        return $this->id;
    }

    public function getAbonneReservation() : Abonne {
        return $this->Abonne;
    }

    public function getDocumentReservation() : Exemplaire {
        return $this->exemplaire;
    }
}
?>