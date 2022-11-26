<h2>Disques DVD : </h2>
<div class="container-fluid">
<?php
    foreach($disques as $unDvd){
        ?>
        
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-horizontal">
                        <div class="img-square-wrapper">
                            <img class="" src="<?= $unDvd->getImage() ?>" alt="<?= $unDvd->getTitre() ?>">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><?= $unDvd->getSynopsis() ?></h4>
                            <p class="card-text"><?= $unLivre->getRealisateur() ?></p>
                            <p class="card-text"><?= $unLivre->getDuree() ?></p>
                            <p class="card-text"><?= $unLivre->getCollection() ?></p>
                        </div>
                    </div>
                    <div class="card-footer">
                    <?php 
                        $txtExemplaires = "Aucun exemplaires";
                        $txtRayons = "";
                        $nbExemplaires = count($unDvd->getLesExemplaires()); 
                        if ($nbExemplaires>0){
                            $txtRayons = "Rayon";
                            $txtExemplaires = $nbExemplaires . " exemplaire";
                            $finTxt = " : ";
                            if ($nbExemplaires > 1){
                                $finTxt = "s : ";
                            }
                            $txtRayons .= $finTxt;
                            $txtExemplaires .= $finTxt;
                            
                            foreach ($unDvd->getLesExemplaires() as $unExemplaire){
                                $txtRayons .= $unExemplaire->getLeRayon() . ", ";
                            }
                            $txtRayons = substr($txtRayons, 0, -2);
                        }?>
                        <small class="text-muted"> 
                            <?= $txtExemplaires . " - " . $txtRayons ?>
                        </small>
                        <button type="submit" name="recherche" class="btn btn-primary col-md-12" style="width: 200px; background-color: black; border-color: black;"><span class="glyphicon glyphicon-floppy-disk"></span> Réserver</a>
                    </div>
                </div>
            </div>
        </div>


    <?php
    }
?>

</div>