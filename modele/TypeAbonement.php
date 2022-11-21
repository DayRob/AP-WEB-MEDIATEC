<?php 

class typeAbonnement{
    private $id;
    private string $libelle; 

    /**
     * constrcuteur de la classe typeAbonnement
     *
     * @param integer $unId
     * @param string $unLibelle
     */
    public function __construct(int $unId, string $unLibelle)
    {
        $this->id=$unId;
        $this->libelle= $unLibelle;
        
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
    public function getLibelle() : string {
        return $this->libelle;
    }


}


?>