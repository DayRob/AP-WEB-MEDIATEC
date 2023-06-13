<?php

class Historique
{
    private $id;
    private $libelle;
    private $date;
    private $nbResultat;
    private $requete;

    /**
     * Undocumented function
     *
     * @param integer $id
     * @param string $libelle
     * @param DateTime $date
     * @param integer $nbResultat
     */
    public function __construct(int $id, string $libelle, DateTime $date, int $nbResultat, string $requete)
    {
        $this->id = $id;
        $this->libelle = $libelle;
        $this->date = $date;
        $this->nbResultat = $nbResultat;
        $this->requete = $requete;
    }

    /**
     * Accesseur de la propriété id
     *
     * @return integer
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Accesseur de la propriété libelle
     *
     * @return string
     */
    public function getLibelle(): string
    {
        return $this->libelle;
    }

    /**
     * Accesseur de la propriété date
     *
     * @return string
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }

    /**
     * Mutateur de la propriété id
     *
     * @param integer $id
     * @return void
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }


    /**
     * Accesseur de la propriété id
     *
     * @return integer
     */
    public function getNbResultat(): int
    {
        return $this->nbResultat;
    }

    /**
     * Accesseur de la propriété id
     *
     * @return string
     */
    public function getRequete(): string
    {
        return $this->requete;
    }
}
