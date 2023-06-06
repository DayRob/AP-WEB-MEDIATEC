<?php

class documentManager extends Manager
{
    /**
     * Renvoie un tableau associatif contenant l'ensemble des objets Dvd
     *
     * @return array
     */
    public function getList() : array
    {
        $livreManager = new LivreManager();
        $lesLivres = $livreManager->getList();

        $DvdManager = new DvdManager();
        $lesDvds = $DvdManager->getList();

        $lesDocuments = array_merge($lesLivres,$lesDvds);

        return $lesDocuments;
    }
}

?>