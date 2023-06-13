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
     * @param string $date
     * @param integer $nbResultat
     * @param string $requete
     */
    public function __construct(int $id, string $libelle, string $date, int $nbResultat, string $requete)
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
    public function getDate(): string
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
     * Mutateur de la propriété libelle
     *
     * @param string $libelle
     * @return void
     */
    public function setLibelle(string $libelle): void
    {
        $this->libelle = $libelle;
    }

    /**
     * Mutateur de la propriété date
     *
     * @param string $date
     * @return void
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * Mutateur de la propriété nbResultat
     *
     * @param integer $nbResultat
     * @return void
     */
    public function setNbResultat(int $nbResultat): void
    {
        $this->nbResultat = $nbResultat;
    }

    /**
     * Mutateur de la propriété requete
     *
     * @param string $requete
     * @return void
     */
    public function setRequete(string $requete): void
    {
        $this->requete = $requete;
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
