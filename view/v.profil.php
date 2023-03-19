
<div id="deco">
    <a href="../controller/deconnexion.php">DECONNEXION</a>
    </div>
<div id="profile">

    <div id="grid1">
    <p>{</p>    
    <?php echo $cardAfficheUser; ?>
    <p>}</p>  
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
    <div id="grid2"><?php echo $cardAfficheConcerts; ?></div>
</div>


