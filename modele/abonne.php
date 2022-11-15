<?php

class abonne {
    private $id;
    private string $nom; 
    private string $prenom;
    private string $adresse; 
    private string $dateNaissance;
    private string $adresseMail;
    private string $numeroTelephone;
    
    
    
    public function __construct(int $unId, string $unNom, string $unPrenom, string $uneAdresse, string $uneDateNaissance, string $uneAdresseMail, string $unNumeroTel)
    {
        $this->id = $unId;
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