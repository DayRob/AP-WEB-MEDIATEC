<?php

class Etat {
    private $id;
    private $libelle; 
    
    /**
     * Constructeur de la classe Etat
     *
     * @param integer $id
     * @param string $libelle
     */
    public function __construct(int $id, string $libelle)
    {
        $this->id = $id;
        $this->libelle = $libelle;
    }

    /**
     * Accesseur de la propriété id
     *
     * @return integer
     */
    public function getId() : int {
        return $this->id;
    }

    /**
     * Accesseur de la propriété libelle
     *
     * @return string
     */
    public function getTitre() : string {
        return $this->libelle;
    }

    /**
     * Mutateur de la propriété id
     *
     * @param integer $id
     * @return void
     */
    public function setId(int $id): void {
        $this->id = $id;
    }

    /**
     * Mutateur de la propriété libelle
     *
     * @param string $libelle
     * @return void
     */
    public function setLibelle(string $libelle): void {
        $this->libelle = $libelle;
    }

}
?>