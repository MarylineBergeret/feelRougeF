
    <div id="deco">
        <a href="../controller/deconnexion.php">DECONNEXION</a>
        </div>
    <div id="profile">

        <div id="grid1">
            <div class='card' id='cardAfficheUser'>
                <div class='card-header'>
                 <h2>Profil : <?php echo $user['pseudo_user'] ?></h2>
                </div>
                    <div class='card-body'>
                        <div class='row'>
                            <div class='col-sm-3'>
                            <img src='<?php echo $imageUrl ?>' class='img-thumbnail'>
                            </div>
                                <div class='col-sm-9' id='pCard1'>
                                    <p>Pseudo : <?php echo $user['pseudo_user'] ?></p>
                                    <p>Adresse e-mail : <?php echo substr_replace(substr_replace($user['mail_user'], str_repeat('*', $pos-1), 1, $pos-1), str_repeat('*', $pos+2), $pos+1, 4) ?></p>
                                    <p>Biographie : <?php echo $user['bio_user'] ?></p>
                                        <form action='update_pseudo.php' method='post'>
                                            <div class='form-group'>
                                                <label for='new_pseudo'>Nouveau pseudo :</label>
                                                <input type='text' class='form-control' id='new_pseudo' name='new_pseudo' value='<?php echo $user['pseudo_user'] ?>'>
                                            </div>
                                            <div class='form-group'>
                                                <label for='new_bio'>Modifier Bio :</label>
                                                <input type='text' class='form-control' id='new_bio' name='new_bio' value='<?php echo $user['bio_user'] ?>'>
                                            </div>
                                            <div class='form-group'>
                                                <form action='upload_image.php' method='post' enctype='multipart/form-data'>
                                                    <label for='image'>Changer l'image :</label><br>
                                                    <input type='file' id='image' name='image' accept='image/*'><br>
                                                </form>
                                            </div>
                                            <button type='submit' class='btn btn-primary' id='buttonSendProfil'>Enregistrer</button>
                                        </form>
                                </div> <!-- end col-sm-9 -->
                        </div> <!-- end row -->
                    </div> <!-- end card-body -->
            </div> <!-- end card -->
 
    </div>

<div id="grid2">  
    <div class='card' id='cardAfficheConcerts'>
        <div class='card-header'><h2><?php echo $user['pseudo_user']?> : SON TOP 5 </h2>
        </div>
            <div class='card-body'>
                <div class='row'>
                    <div class='col-sm-3'><img src= <?php echo $imageUrl?> class='img-thumbnail'>
                    </div>
                        <div class='col-sm-9' id='pCard2'>
                        <?php foreach ($concerts as $concert) {?>
       
                            <p><?php echo $concert['band_concert']?></p><br> 
                            <p><?php echo $concert['location_concert']?></p><br>
                            <p><?php echo $concert['year_concert'];}?></p><br>
    
                        </div>  <!-- end col-sm-9-->
                </div> <!-- end row-->
            </div>" <!-- end card-body-->
    </div>" <!-- end card-->
        
</div>

    
    <div id="formTop5" class="container">
        <form id="concertForm" method="POST" action="../controller/profil.php" class="row g-3">
            <div class="col-md-4">
            <label class="form-label text-center">Concert préféré 1 :</label>
            <input type="text" name="concert1" value="Top 1" class="form-control">
            <input type="text" name="concert1_band" class="form-control" placeholder="Nom de l'artiste ou du groupe">
            <input type="text" name="concert1_location" class="form-control" placeholder="Lieu du concert">
            <input type="text" name="concert1_year" class="form-control" placeholder="Année du concert">
            </div>
            <div class="col-md-4">
            <label class="form-label text-center">Concert préféré 2 :</label>
            <input type="text" name="concert2" value="Top 2" class="form-control">
            <input type="text" name="concert2_band" class="form-control" placeholder="Nom de l'artiste ou du groupe">
            <input type="text" name="concert2_location" class="form-control" placeholder="Lieu du concert">
            <input type="text" name="concert2_year" class="form-control" placeholder="Année du concert">
            </div>
            <div class="col-md-4">
            <label class="form-label text-center">Concert préféré 3 :</label>
            <input type="text" name="concert3" value="Top 3" class="form-control">
            <input type="text" name="concert3_band" class="form-control" placeholder="Nom de l'artiste ou du groupe">
            <input type="text" name="concert3_location" class="form-control" placeholder="Lieu du concert">
            <input type="text" name="concert3_year" class="form-control" placeholder="Année du concert">
            </div>
            <div class="col-md-4">
            <label class="form-label text-center">Concert préféré 4 :</label>
            <input type="text" name="concert4" value="Top 4" class="form-control">
            <input type="text" name="concert4_band" class="form-control" placeholder="Nom de l'artiste ou du groupe">
            <input type="text" name="concert4_location" class="form-control" placeholder="Lieu du concert">
            <input type="text" name="concert4_year" class="form-control" placeholder="Année du concert">
            </div>
            <div class="col-md-4">
            <label class="form-label">Concert préféré 5 :</label>
            <input type="text" name="concert5" value="Top 5" class="form-control">
            <input type="text" name="concert5_band" class="form-control" placeholder="Nom de l'artiste ou du groupe">
            <input type="text" name="concert5_location" class="form-control" placeholder="Lieu du concert">
            <input type="text" name="concert5_year" class="form-control" placeholder="Année du concert">
            </div>
            <div>
            <input type="submit" value="Envoyer">
            </div>
        </form>

    </div>
 

