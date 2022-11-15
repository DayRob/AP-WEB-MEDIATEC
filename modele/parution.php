<?php

class Parution {
    private $numero;
    private $revue; 
    private $dateParution;
    private $photo;
    private $etat;
    
    /**
     * Constructeur de la classe Parution
     *
     * @param integer $numero
     * @param Revue $revue
     * @param string $dateParution
     * @param string $photo
     * @param Etat $etat
     */
    public function __construct(int $numero, Revue $revue, string $dateParution, string $photo, Etat $etat)
    {
        $this->numero = $numero;
        $this->revue = $revue;
        $this->dateParution = $dateParution;
        $this->photo = $photo;
        $this->etat = $etat;
    }

    /**
     * Accesseur de la propriété numero
     *
     * @return integer
     */
    public function getNumero() : int {
        return $this->numero;
    }

    /**
     * Accesseur de la propriété dateParution
     *
     * @return string
     */
    public function getDateParution() : string {
        return $this->dateParution;
    }

    /**
     * Accesseur de la propriété photo
     *
     * @return string
     */
    public function getPhoto() : string {
        return $this->photo;
    }

    
    // a completer getter/setter


}
?>