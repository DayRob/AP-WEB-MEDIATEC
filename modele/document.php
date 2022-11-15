<?php

class Document {
    private $id;
    private $titre; 
    private $image;
    private $commandeEnCours; 
    private $typePublic;
    private $lesExemplaires ;
    
    /**
     * construteur de la classe Document
     *
     * @param integer $id
     * @param string $titre
     * @param string $image
     * @param boolean $commandeEnCours
     * @param TypePublic $public
     */
    public function __construct(int $id, string $titre, string $image, bool $commandeEnCours, TypePublic $public)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->image = $image;
        $this->commandeEnCours = $commandeEnCours;
        $this->typePublic = $public;

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
     * Accesseur de la propriété titre
     *
     * @return string
     */
    public function getTitre() : string {
        return $this->titre;
    }

    /**
     * Accesseur de la propriété image
     *
     * @return string
     */
    public function getImage() : string {
        return $this->image;
    }
    
    /**
     * Accesseur de la propriété commandeEnCours
     *
     * @return boolean
     */
    public function getcommandeEnCours() : bool {
        return $this->commandeEnCours;
    }
    
    /**
     * Accesseur de la propriété typePublic
     *
     * @return TypePublic
     */
    public function getTypePublic() : TypePublic {
        return $this->typePublic;
    }

    /**
     * Accesseur de la propriété lesExemplaires
     *
     * @return array
     */
    public function getLesExemplaires() : array {
        return $this->lesExemplaires;
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
     * Mutateur de la propriété lesExemplaires
     *
     * @param array $lesExemplaires
     * @return void
     */
    public function setlesExemplaires(array $lesExemplaires): void {
        $this->lesExemplaires = $lesExemplaires;
    }



}
?>