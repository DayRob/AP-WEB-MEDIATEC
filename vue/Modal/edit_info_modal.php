<!-- Modal supp -->
<div class="modal fade bd-example-modal-lg" id="ModalModifInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modals-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier mon Mot de passe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="./?action=ModifierMdp" method="POST">
                        <!-- Email input -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">saisir votre nom</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" name="verifMdp" class="form-control" />
                            <label class="form-label" for="form2Example2">retaper votre nouveau mots de passe</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuler</button>
                            <button type="submit" class="btn btn-primary" name="modifierMdp">enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>