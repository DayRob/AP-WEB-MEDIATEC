<?php
echo
'<h1>' . $titre . '</h1>'
?>
<?php
$historiqueManager = new historiqueManager();
$lesHistoriques = $historiqueManager->getList();
foreach ($lesHistoriques as $unHistorique) {

?>
    <br />
    <form method="POST" action="?action=historiqueRecherche">

        <div class="card">
            <div class="card-body container">
                <div class="container">
                    <div class="card mt-5 border-5 pt-2 active pb-0 px-3">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-12 ">
                                    <h4 class="card-title "><b>Titre : <?= $unHistorique->getLibelle() ?></b></h4>

                                </div>

                            </div>

                        </div>

                        <div class="card-footer bg-white px-0 ">
                            <div class="row">

                                <div class=" col-md-auto ">
                                    <a href="#" class="btn btn-outlined btn-black text-muted bg-transparent" data-wow-delay="0.7s"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
                                            <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                        </svg> &nbsp;<small>DATE : <?= $unHistorique->getDate() ?></small></a>

                                    <i class="mdi mdi-settings-outline"></i>

                                    <a href="#" class="btn btn-outlined btn-black text-muted "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                        </svg>&nbsp;<small>SUPPRIMER</small></a>


                                    <a name="rechercheHistorique" href="#" class="btn btn-outlined btn-black text-muted "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path d="M18.125,15.804l-4.038-4.037c0.675-1.079,1.012-2.308,1.01-3.534C15.089,4.62,12.199,1.75,8.584,1.75C4.815,1.75,1.982,4.726,2,8.286c0.021,3.577,2.908,6.549,6.578,6.549c1.241,0,2.417-0.347,3.44-0.985l4.032,4.026c0.167,0.166,0.43,0.166,0.596,0l1.479-1.478C18.292,16.234,18.292,15.968,18.125,15.804 M8.578,13.99c-3.198,0-5.716-2.593-5.733-5.71c-0.017-3.084,2.438-5.686,5.74-5.686c3.197,0,5.625,2.493,5.64,5.624C14.242,11.548,11.621,13.99,8.578,13.99 M16.349,16.981l-3.637-3.635c0.131-0.11,0.721-0.695,0.876-0.884l3.642,3.639L16.349,16.981z"></path>
                                        </svg>&nbsp;<small>RECHERCHER</small></a>
                                    <span class="vl ml-3"></span>
                                </div>

                                <!-- <div class="col-md-auto ">
                                <ul class="list-inline">
                                    <li class="list-inline-item"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1573035860/Pra/Hadie-profile-pic-circle-1.png" alt="DP" class="  rounded-circle img-fluid " width="35" height="35">
                                    </li>
                                    <li class="list-inline-item"> <img src="https://img.icons8.com/ios/50/000000/plus.png" width="30" height="30 " class="more">
                                    </li>
                                </ul>
                            </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php
    }
        ?>

    </form>