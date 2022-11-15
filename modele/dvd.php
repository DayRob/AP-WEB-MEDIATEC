<?php

class Dvd extends Document {
    private $synopsis;
    private $realisateur; 
    private $duree;
    
    /**
     * constructeur de la classe Dvd
     *
     * @param integer $id
     * @param string $titre
     * @param string $image
     * @param boolean $commandeEnCours
     * @param TypePublic $public
     * @param string $synopsis
     * @param string $realisateur
     * @param integer $duree
     */
    public function __construct(int $id, string $titre, string $image, bool $commandeEnCours, TypePublic $public, string $synopsis, string $realisateur, int $duree)
    {
        parent::__construct($id, $titre, $image, $commandeEnCours, $public);
        $this->synopsis = $synopsis;
        $this->realisateur = $realisateur;
        $this->duree = $duree;
    }

    /**
     * Accesseur de la propriété synopsis
     *
     * @return string
     */
    public function getSynopsis() : string {
        return $this->synopsis;
    }

    /**
     * Accesseur de la propriété realisateur
     *
     * @return string
     */
    public function getRealisateur() : string {
        return $this->realisateur;
    }

    /**
     * Accesseur de la propriété duree
     *
     * @return integer
     */
    public function getDuree() : int {
        return $this->duree;
    }

}
?>