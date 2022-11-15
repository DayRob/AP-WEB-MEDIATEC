<?php

class Exemplaire {
    private $numero;
    private $document; 
    private $dateAchat;
    private $rayon;
    private $etat;
    
    /**
     * Constructeur de la classe Exemplaire
     *
     * @param integer $numero
     * @param Document $document
     * @param string $dateAchat
     * @param Rayon $rayon
     * @param Etat $etat
     */
    public function __construct(int $numero, Document $document, string $dateAchat, Rayon $rayon, Etat $etat)
    {
        $this->numero = $numero;
        $this->document = $document;
        $this->dateAchat = $dateAchat;
        $this->rayon = $rayon;
        $this->etat = $etat;
    }



    
    // a completer getter/setter


    /**
     * Accesseur de la propriété libelle de la propriété rayon
     *
     * @return string
     */
    public function getLeRayon() : string {
        return $this->rayon->getLibelle();
    }

}
?>