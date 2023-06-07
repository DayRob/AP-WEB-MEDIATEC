<h1>Rechercher dans le catalogue</h1>
<br />
<form method="POST" action="?action=rechercheAvancee">
    <div class="card">
        <div class="card-body">

            <div class="form-row">
                <div class="form-group col-md-1">

                </div>
                <div class="form-group col-md-2">
                    <input id="" name="" class="form-control" placeholder="" type="text" disabled value="Titre">
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <select class="form-control" name="titreSearchType" id="titreSearchType" required>
                        <option value="tout" selected>Tous les mots</option>
                        <option value="saisis">Mots saisis</option>
                    </select>
                </div>
                <div class="form-group col-md-7">
                    <input id="textTitre" name="textTitre" class="form-control" placeholder="Saisissez les termes de votre recherche." type="text">
                </div>


            </div>

        </div>
    </div>
    <div class="card">
        <div class="card-body">

            <div class="form-row">
                <div class="form-group col-md-1">
                    <select class="form-control" name="auteurCombinaison" id="auteurCombinaison" required>
                        <option value="et" selected>Et</option>
                        <option value="ou">Ou</option>
                        <option value="sauf">Sauf</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <input id="" name="" class="form-control" placeholder="" type="text" disabled value="Auteur">
                </div>
                <div class="form-group col-md-2">
                    <select class="form-control" name="auteurSearchType" id="auteurSearchType" required>
                        <option value="tout" selected>Tous les mots</option>
                        <option value="saisis">Mots saisis</option>
                    </select>
                </div>
                <div class="form-group col-md-7">
                    <input id="textAuteur" name="textAuteur" class="form-control" placeholder="Saisissez les termes de votre recherche." type="text">
                </div>




            </div>

        </div>
    </div>


    <div class="card">
        <div class="card-body">

            <div class="form-row">
                <div class="form-group col-md-1">
                    <select class="form-control" name="sujetCombinaison" id="sujetCombinaison" required>
                        <option value="et" selected>Et</option>
                        <option value="ou">Ou</option>
                        <option value="sauf">Sauf</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <input id="" name="" class="form-control" placeholder="" type="text" disabled value="Sujet">
                </div>
                <div class="form-group col-md-2">
                    <select class="form-control" name="sujetSearchType" id="sujetSearchType" required>
                        <option value="tout" selected>Tous les mots</option>
                        <option value="saisis">Mots saisis</option>
                    </select>
                </div>
                <div class="form-group col-md-7">
                    <input id="textSujet" name="textSujet" class="form-control" placeholder="Saisissez les termes de votre recherche." type="text">
                </div>


            </div>

        </div>
    </div>

    <div class="card">
        <div class="card-body">

            <div class="form-row">
                <div class="form-group col-md-1">
                    <select class="form-control" name="collectionCombinaison" id="collectionCombinaison" required>
                        <option value="et" selected>Et</option>
                        <option value="ou">Ou</option>
                        <option value="sauf">Sauf</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <input id="" name="" class="form-control" placeholder="" type="text" disabled value="Collection">
                </div>
                <div class="form-group col-md-2">
                    <select class="form-control" name="collectionSearchType" id="collectionSearchType" required>
                        <option value="tout" selected>Tous les mots</option>
                        <option value="saisis">Mots saisis</option>
                    </select>
                </div>
                <div class="form-group col-md-7">
                    <input id="textCollection" name="textCollection" class="form-control" placeholder="Saisissez les termes de votre recherche." type="text">
                </div>


            </div>

        </div>
    </div>
    <div>
        <div class="form-group">
            <button style="width: 200px;" type="submit" name="recherche" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Lancer la recherche</button>
            <button style="width: 220px;" type="reset" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Réinitialiser la recherche</button>
        </div>

    </div>

</form>