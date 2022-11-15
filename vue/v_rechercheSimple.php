<h1>Recherche simple dans le catalogue de la Médiathèque</h1>
<br/>

<div class="card">
    <div class="card-body">
        <form method="POST" action="?action=rechercheSimple">
            <div class="form-row">
                <div class="form-group col-md-2">
                    <select class="form-control" name="searchType" id="searchType" required >
                        <option value="tout" selected>Tout</option>
                        <option value="livre" >Livre</option>
                        <option value="dvd" >DVD</option>
                        <option value="revue" >Revue</option>
                    </select>
                </div>
                <div class="form-group col-md-7">
                    <input id="searchText" name="searchText" class="form-control" placeholder="Saisissez les termes de votre recherche." type="text">
                </div>

                <div class="form-group col-md-3">
                    <button type="submit" name="recherche" class="btn btn-primary col-md-12"><span class="glyphicon glyphicon-floppy-disk"></span> Lancer la recherche</a>
                </div>
            </div>
        </form>
    </div>
</div>

