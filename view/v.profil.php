

    <div id="profile">

        <div id="grid1" class="col-sm-12 col-md-6">
            <div class='card' id='cardAfficheUser'>
                <div class='card-header'>
                 <h2 class="titreH2">Profil : <?php echo $user['pseudo_user'] ?></h2>
                </div>
                    <div class='card-body'>
                        <div class='row'>
                            <div class='col-sm-4'>
                                <div id="img-container"><img src='<?php echo $imageUrl?>' class='img-thumbnail'>
                                </div>
                                <form action='../controller/profil.php' method='POST' enctype="multipart/form-data" class="formProfil">

                                    <div class='form-group'>
                                        <label for='imageChange'>Changer l'image :</label><br>
                                        <input type='file' id='imageChange' name='file'><br>
                                        <button type='submit' class='btn btn-primary' id='buttonSendProfil'>Enregistrer</button>              
                                    </div>
                                </form>
                            </div>
                            <div class='col-sm-8' id='pCard1'>
                                <p>Pseudo : <?php echo $user['pseudo_user'] ?></p>
                                <p>Adresse e-mail : <?php echo substr_replace(substr_replace($user['mail_user'], str_repeat('*', $pos-1), 1, $pos-1), str_repeat('*', $pos+2), $pos+1, 4) ?></p>
                                <p>Biographie : <?php echo $user['bio_user'] ?></p>
                                    <form action='../controller/update.php' method='POST' class="formProfil">
                                        <div class='form-group'>
                                            <label for='new_pseudo'>Nouveau pseudo :</label>
                                            <input type='text' class='form-control' id='new_pseudo' name='new_pseudo' value='<?php echo $user['pseudo_user'] ?>'>
                                        </div>
                                        <div class='form-group'>
                                            <label for='new_email'>Nouveau mail :</label>
                                            <input type='text' class='form-control' id='new_email' name='new_email' value='<?php echo substr_replace(substr_replace($user['mail_user'], str_repeat('*', $pos-1), 1, $pos-1), str_repeat('*', $pos+2), $pos+1, 4) ?>'>
                                        </div>
                                        <div class='form-group'>
                                            <label for='new_bio'>Modifier Bio :</label>
                                            <input type='text' class='form-control' id='new_bio' name='new_bio' value='<?php echo $user['bio_user'] ?>'>
                                        </div>
                                        <button type='submit' class='btn btn-primary' id='buttonSendProfil'>Enregistrer</button>
                                    </form>
                            </div> <!-- end col-sm-9 -->
                        </div> <!-- end row -->
                    </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div>
<!--affichage des concerts préférés dans une card-->
        <div id="grid2">  
            <div class='card' id='cardAfficheConcerts'>
                <div class='card-header'><h2 class="titreH2"><?php echo $user['pseudo_user']?> : SON TOP 5 </h2>
                </div>
                    <div class='card-body'>
                        <div class='row'>
                            <div class='col-sm-3' id="img-container2"><img src='<?php echo $imageUrl?>' class='img-thumbnail'>
                            </div>
                                <div class='col-sm-9' id='pCard2'>
                                <?php foreach ($concerts as $concert) {?>
            
                                    <p><?php echo $concert['band_concert']?>, <?php echo $concert['location_concert']?>, <?php echo $concert['year_concert'];}?></p>
            
                                </div>  <!-- end col-sm-9-->
                        </div> <!-- end row-->
                    </div> <!-- end card-body-->
            </div><!-- end card-->
                
        </div>
    </div>

    <p id="textPForm">Vous pouvez rentrez votre top 5 avec ce formulaire :</p>
    <div id="formTop5" class="container">
        <form id="concertForm" method="POST" action="../controller/profil.php" class="row g-3">
            <div class="col-md-4">
            <label class="form-label" for="concert1">Concert préféré 1 :</label>
            <input type="text" name="concert1" id="concert1" value="Top 1" class="form-control">
            <input type="text" name="concert1_band" id="concert1_band" class="form-control" placeholder="Nom de l'artiste ou groupe">
            <input type="text" name="concert1_location" id="concert1_location" class="form-control" placeholder="Lieu du concert">
            <input type="text" name="concert1_year" id="concert1_year" class="form-control" placeholder="Année du concert">
            </div>
            <div class="col-md-4">
            <label class="form-label" for="concert2">Concert préféré 2 :</label>
            <input type="text" name="concert2" id="concert2" value="Top 2" class="form-control">
            <input type="text" name="concert2_band" id="concert2_band" class="form-control" placeholder="Nom de l'artiste ou groupe">
            <input type="text" name="concert2_location" id="concert2_location" class="form-control" placeholder="Lieu du concert">
            <input type="text" name="concert2_year" id="concert2_year" class="form-control" placeholder="Année du concert">
            </div>
            <div class="col-md-4">
            <label class="form-label" for="concert3">Concert préféré 3 :</label>
            <input type="text" name="concert3" id="concert3" value="Top 3" class="form-control">
            <input type="text" name="concert3_band" id="concert3_band" class="form-control" placeholder="Nom de l'artiste ou groupe">
            <input type="text" name="concert3_location" id="concert3_location" class="form-control" placeholder="Lieu du concert">
            <input type="text" name="concert3_year" id="concert3_year" class="form-control" placeholder="Année du concert">
            </div>
            <div class="col-md-4">
            <label class="form-label" for="concert4">Concert préféré 4 :</label>
            <input type="text" name="concert4" id="concert4" value="Top 4" class="form-control">
            <input type="text" name="concert4_band" id="concert4_band" class="form-control" placeholder="Nom de l'artiste ou groupe">
            <input type="text" name="concert4_location" id="concert4_location" class="form-control" placeholder="Lieu du concert">
            <input type="text" name="concert4_year" id="concert4_year" class="form-control" placeholder="Année du concert">
            </div>
            <div class="col-md-4">
            <label class="form-label" for="concert5">Concert préféré 5 :</label>
            <input type="text" name="concert5" id="concert5" value="Top 5" class="form-control">
            <input type="text" name="concert5_band" id="concert5_band" class="form-control" placeholder="Nom de l'artiste ou groupe">
            <input type="text" name="concert5_location" id="concert5_location" class="form-control" placeholder="Lieu du concert">
            <input type="text" name="concert5_year" id="concert5_year"class="form-control" placeholder="Année du concert">
            </div>
            <div>
            <input type="submit" value="Envoyer" id="buttonTop">
            </div>
        </form>

    </div>
 

