 <h1> Festivals Européens - OUI - mais lequel ?</h1>
  <div class="voteGif"><img src="https://media.giphy.com/media/sTu7VKav1BU53CYhmT/giphy.gif" alt="vote"></div>
  <div id="festival">
  
  <!-- Afficher chaque carte avec une icône "like" -->
  <?php foreach ($cardFestivals as $cardFestival) : ?>

    <?php 
    if(isset($_SESSION['user'])){
      $idUser = $_SESSION['user']['id_user'];
      $idCardFestival = $cardFestival['id_cardFestival'];
      $liked = getLikes($bdd, $idUser, $idCardFestival);
    }
    ?>

    <div class="card1">
      <h2><?= $cardFestival['name_cardFestival']; ?>
      </h2>
      <div class="card-content1">    
          <img src="<?= $cardFestival['img_cardFestival']; ?>" class="imgCard" alt="festival" width="300px">
          <p><?= $cardFestival['content_cardFestival']; ?></p>
          <span class="likes">
         
            likes
          </span>
          <?php if(isset($_SESSION['user'])) :?>
          <button class="like-btn" onclick="like(this, '<?=$cardFestival['id_cardFestival']?>', '<?=$_SESSION['user']['id_user']?>' )" ><?= $liked ? 'unlike' : 'like' ?></button>
          <?php endif?>
        </div>  

      <div class="comment_form">
        <form method="POST" action="../controller/festival.php" class="comment_form">
          <label for="commentaire">Votre commentaire :</label><br>
          <textarea name="content_commentCard" id="content_commentCard"></textarea>
          <input type="text" name="id_cardFestival" id="inputIdFest" value="<?=$cardFestival['id_cardFestival']?>"><br>
          <input name="submit" type="submit" value="Envoyer">
        </form>
      </div>             
    </div>
    
  <?php endforeach ?>
    <!-- <div class="comments">
    
      <div class="comment">
        <p class="comment-content">x</p>
        <span class="comment-date">x</span>
      </div>
    </div>

  </div> -->

    <div id="lien">
      <p>Vous pouvez trouver tous les festivals Européens en suivant ce lien : </p>
        <a href="https://www.concerts-metal.com/festivals.html" target="_blank">En savoir plus sur les Festivals 2023</a>
    </div>




    
    

