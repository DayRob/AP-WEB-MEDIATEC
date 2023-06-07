<?php

class Exemplaire {
    private $document; 
    private $numero;
    private $dateAchat;
    private $rayon;
    private $etat;
    
    /**
     * Constructeur de la classe Exemplaire
     *
     * @param Document $document
     * @param string $numero
     * @param string $dateAchat
     * @param Rayon $rayon
     * @param Etat $etat
     */
    public function __construct(Document $document, string $numero, string $dateAchat, Rayon $rayon, Etat $etat)
    {
        $this->document = $document;
        $this->numero = $numero;
        $this->dateAchat = $dateAchat;
        $this->rayon = $rayon;
        $this->etat = $etat;
    }

    /**
     * Accesseur de la propriété libelle de la propriété rayon
     *
     * @return string
     */
    public function getLeRayon() : string {
        return $this->rayon->getLibelle();
    }

    public function getLeNumero() : string {
        return $this->numero;
    }

    public function getLeDocument() : Document {
        return $this->document;
    }

    public function getEtat() : Etat {
        return $this->etat;
    }

}
?>