<?php

class Livre extends Document {
    private $ISBN;
    private $auteur; 
    private $collection;
    
    /**
     * Constructeur de la classe Livre
     *
     * @param integer $id
     * @param string $titre
     * @param string $image
     * @param boolean $commandeEnCours
     * @param TypePublic $public
     * @param string $ISBN
     * @param string $auteur
     * @param string $collection
     */
    public function __construct(int $id, string $titre, string $image, bool $commandeEnCours, TypePublic $public, string $ISBN, string $auteur, string $collection)
    {
        parent::__construct($id, $titre, $image, $commandeEnCours, $public);
        $this->ISBN = $ISBN;
        $this->auteur = $auteur;
        $this->collection = $collection;
    }

    /**
     * Accesseur de la propriété ISBN
     *
     * @return string
     */
    public function getISBN() : string {
        return $this->ISBN;
    }

    /**
     * Accesseur de la propriété auteur
     *
     * @return string
     */
    public function getAuteur() : string {
        return $this->auteur;
    }

    /**
     * Accesseur de la propriété collection
     *
     * @return string
     */
    public function getCollection() : string {
        return $this->collection;
    }

    // a completer

}
?>