/**
 * Chargement des informations d'un resto dans une modale avec appel au controleur de modales
 * @param {*} idLivre id du resto à charger
 * @param {*} div nom du div de modale à remplir
 */
function chargeModaleDetailsLivre(idLivre, div){
    // console.log(idLivre, div);

    var http = new XMLHttpRequest();
    var params = "?action=modale&modale=detailsLivre&idLivre="+idLivre;
    http.open('GET', params, true);

    //Send the proper header information along with the request
    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    http.onreadystatechange = function() {//Call a function when the state changes.
        if(http.readyState == 4 && http.status == 200) {
            //console.log(http.responseText);
            $(div).html(http.responseText);
        }
    }
    http.open('GET', params);
    http.send();
}

function chargeModaleDetailsReservation(idDocument, idExemplaire, div){
    // console.log(idExemplaire, div);

    var http = new XMLHttpRequest();
    var params = "?action=modale&modale=detailsReservation&idDocument="+idDocument+"&idExemplaire="+idExemplaire;
    http.open('GET', params, true);

    //Send the proper header information along with the request
    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    http.onreadystatechange = function() {//Call a function when the state changes.
        if(http.readyState == 4 && http.status == 200) {
            //console.log(http.responseText);
            $(div).html(http.responseText);
        }
    }
    http.open('GET', params);
    http.send();
}