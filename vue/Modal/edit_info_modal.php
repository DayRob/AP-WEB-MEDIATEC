<!-- Modal supp -->
<div class="modal fade bd-example-modal-lg" id="ModalModifInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modals-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier mes informations</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="./?action=ModifierInfo" method="POST">
                        <!-- info abonne input -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">saisir votre nom</label>
                            <input type="text" name="nom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value=<?php echo $nom ?>>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">saisir votre prenom</label>
                            <input type="text" name="prenom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="entrer un nouveau prenom" value=<?php echo $prenom ?>>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">saisir votre adresse</label>
                            <input type="text" name="adresse" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value=<?php echo $adresse ?>>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">date de Naissance</label>
                            <input type="date" name="DateNaissance" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="entrer votre nouvelle date de naissance" value=<?php echo $dateNaissance ?>>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">adresse email</label>
                            <input type="email" name="adresseMail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="entrer votre nouvelle adrresse email" value=<?php echo $adresseEmail ?>>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">saisir votre numero de telephone</label>
                            <input type="tel" name="numeroTel" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="saisir sous ce format :06.52.44.44.55" value=<?php echo $numeroTelephone ?>>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuler</button>
                            <button type="submit" class="btn btn-primary" name="modifierInfo">enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>