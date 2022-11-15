<h2>Revues : </h2>
<div class="container-fluid">
<?php
    foreach($revues as $uneRevue){
        ?>
        
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-horizontal">
                        <div class="img-square-wrapper">
                            <img class="" src="" alt="<?= $uneRevue->getTitre() ?>">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><?= $uneRevue->getTitre() ?></h4>
                            <?php 
                                if ($uneRevue->getEmpruntable()){
                                    $txt = "Cette revue est empruntable";
                                } else {
                                    $txt = "Cette revue n'est pas empruntable";
                                }                            
                            ?>    
                            <p class="card-text">description de la revue...</p> 
                            <p class="card-text"><?= $txt ?></p>   
                                   
                        </div>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted"> 
                            <?php 
                            $txtNumeros = "Aucun numéros disponibles";
                            $nbNumeros = count($uneRevue->getLesNumeros()); 
                            if ($nbNumeros>0){
                                $txtNumeros = $nbNumeros . " numéro";
                                $finTxt = " : ";
                                if ($nbNumeros > 1){
                                    $finTxt = "s : ";
                                }
                                $txtNumeros .= $finTxt;
                                
                                foreach ($uneRevue->getLesNumeros() as $unNumero){
                                    $txtNumeros .= $unNumero->getNumero() . " (".$unNumero->getDateParution()."), ";
                                }
                                $txtNumeros = substr($txtNumeros, 0, -2);
                            }?>
                        <small class="text-muted"> 
                            <?= $txtNumeros ?>
                        </small>
                        </small>
                    </div>
                </div>
            </div>
        </div>


    <?php
    }
?>
</div>