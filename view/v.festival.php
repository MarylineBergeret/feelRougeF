 <h1> Festivals Européens - OUI - mais lequel ?</h1>
  <div class="voteGif"><img src="https://media.giphy.com/media/sTu7VKav1BU53CYhmT/giphy.gif" alt="vote"></div>
  <div id="festival"> 
  <!-- Afficher chaque carte avec une icône "like" -->
    <?php foreach ($cardFestivals as $cardFestival) : ?>
      <?php 
      $idCardFestival = $cardFestival['id_cardFestival'];
      $num_likes = getCountLikes($bdd, $idCardFestival);
      if(isset($_SESSION['user'])){
        $idUser = $_SESSION['user']['id_user'];
        $liked = getLikes($bdd, $idUser, $idCardFestival);
      }
      ?>
      <div class="card1">
        <h2><?= $cardFestival['name_cardFestival']; ?></h2>
        <div class="card-content1">    
          <img src="<?= $cardFestival['img_cardFestival']; ?>" class="imgCard" alt="festival" width="300px">
          <p><?= $cardFestival['content_cardFestival']; ?></p>
          <span class="likes"><?= $num_likes ?><?= $num_likes > 0 ? ' likes' : ' like' ?></span>
          <?php if(isset($_SESSION['user'])) : ?>
            <button class="like-btn" onclick="like(this, '<?= $cardFestival['id_cardFestival'] ?>', '<?= $_SESSION['user']['id_user'] ?>' )">
              <img id="iconFest" src="../assets/image/<?= $liked ? 'unlike' : 'like' ?>.png" alt="<?= $liked ? 'unlike' : 'like' ?>">
            </button>
          <?php endif ?>
        </div>  
        <div class="comment_form">
          <form method="POST" action="../controller/festival.php" class="comment_form">
            <label for="content_commentCard">Votre commentaire :</label><br>
            <textarea name="content_commentCard" id="content_commentCard"></textarea>
            <input type="text" name="id_cardFestival" id="inputIdFest" value="<?= $cardFestival['id_cardFestival'] ?>"><br>
            <input name="submit" type="submit" value="Envoyer">
          </form>
        </div>             
      </div>    
    <?php endforeach ?>
  </div> 


  <div id="lien">
    <p>Vous pouvez trouver tous les festivals Européens en suivant ce lien : </p>
      <a href="https://www.concerts-metal.com/festivals.html" target="_blank">En savoir plus sur les Festivals 2023</a>
  </div>

  <div class="row">
    <div class="col-lg-4">
      <div id="usersConcert" class="scroll-container">
        <?php foreach ($users as $user) : ?>
          <div class="card" id="cardAfficheConcert">
            <div class="card-header">
              <h2 class="titreH2"><?= $user['pseudo_user'] ?> : SON TOP 5</h2>
            </div>
            <div class="card-body">
              <?php foreach ($user['concerts'] as $concert) : ?>
                <p><?= $concert['band_concert'] ?>, <?= $concert['location_concert'] ?>, <?= $concert['year_concert'] ?></p>
              <?php endforeach; ?>
            </div><!-- end card-body -->
          </div><!-- end card -->
        <?php endforeach; ?>
      </div><!-- end usersConcert -->
    </div><!-- end col-lg-4 -->

    <div class="col-lg-8">
    
      <div id="cardC" class="scroll-container">
        <?php foreach ($comments as $comment) : ?>
          <div class="card-header">
            <p><?= $comment['name_cardFestival'] ?><p>
          </div>
          <div class="card-body2">
            <p><?= $comment['pseudo_user'] ?></p>
            <p><?= $comment['content_commentCard'] ?></p>
            <p>Date: <?= $comment['date_commentCard'] ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div> 
  </div> 
  
  





    
    

