<?php

class commande {
    private $id;
    private $nbExemplaire;
    private $dateCommande;
    private $montant;
    private $idDoc;
    private $idAbonnee;

    public function __construct(int $id, int $nbExemplaire, $dateCommande, double $montant, string $idDoc, int $idAbonne){
        $this->id = $id;
        $this->nbExemplaire = $nbExemplaire;
        $this->dateCommande = $dateCommande;
        $this->montant = $montant;
        $this->idDoc = $idDoc;
        $this->idAbonnee = $idAbonne;
    } 

}
?>