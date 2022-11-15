<?php

class abonne {
    private $id;
    private string $nom; 
    private string $prenom;
    private string $adresse; 
    private string $dateNaissance;
    private string $adresseMail;
    private string $numeroTelephone;
    
    
    /**
     * Undocumented function
     *
     * @param integer $unId
     * @param string $unNom
     * @param string $unPrenom
     * @param string $uneAdresse
     * @param string $uneDateNaissance
     * @param string $uneAdresseMail
     * @param string $unNumeroTel
     */
    public function __construct(int $unId, string $unNom, string $unPrenom, string $uneAdresse, string $uneDateNaissance, string $uneAdresseMail, string $unNumeroTel)
    {
        $this->id = $unId;
        $this->nom = $unNom;
        $this->prenom = $unPrenom;
        $this->adresse = $uneAdresse;
        $this->dateNaissance = $uneDateNaissance;
        $this->adresseMail = $uneAdresseMail;
        $this->numeroTelephone = $unNumeroTel;

    }
    /**
     * Accesseur de la propriété ID
     *
     * @return integer
     */
    public function getId() : int {
        return $this->id;
    }

    /**
     * Accesseur de la propriété Nom
     *
     * @return string
     */
    public function getNom() : string {
        return $this->nom;
    }

    /**
     * Accesseur de la propriété Prénom
     *
     * @return string
     */
    public function getPrenom() : string {
        return $this->prenom;
    }
   
    /**
     * Accesseur de la propriété Adresse
     *
     * @return string
     */
    public function getAdresse() : string {
        return $this->adresse;
    }
    /**
     * Accesseur de la propriété Date Naissance
     *
     * @return string
     */
    public function getDateNaissance() : string {
        return $this->dateNaissance;
    }
    /**
     * Accesseur de la propriété Adresse Mail
     *
     * @return string
     */
    public function getAdresseMail() : string {
        return $this->adresseMail;
    }

    /**
     * Accesseur de la propriété Numéro de Téléphone
     *
     * @return string
     */
    public function getNumeroTel() : string {
        return $this->getNumeroTel;
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
}
?>