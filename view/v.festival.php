<h1> Festivals Européens - OUI - mais lequel ?</h1>
<div class="voteGif">
  <img src="https://media.giphy.com/media/sTu7VKav1BU53CYhmT/giphy.gif" alt="vote">
</div>
<div id="festival">
  <!-- Affiche chaque carte avec compteur selon l'id_CardFestival -->
  <!--  boucle foreach est utilisée pour parcourir chaque élément de $cardFestivals-->
  <?php foreach ($cardFestivals as $cardFestival) : ?>
    <?php 
    $idCardFestival = $cardFestival['id'];
    $num_likes = getCountLikes($bdd, $idCardFestival);
    if(isset($_SESSION['user'])){
      $idUser = $_SESSION['user']['id_user'];
      $liked = getLikes($bdd, $idUser, $idCardFestival);//vérifier si l'utilisateur a aimé la carte de festival.-->
    }   
    ?>
    <!-- CARD FESTIVAL avec bouton like - S'il est connecté, il peut voter - gestion des icônes like / unlike -->
    <div class="card1">
      <h2 class="festivalName"><?= $cardFestival['name_cardFestival']; ?></h2>
      <div class="card-content1">
        <img src="<?= $cardFestival['img_cardFestival']; ?>" class="imgCard" alt="festival" width="300px">
        <div class="flex-container">
          <p class="festivalInfo"><?= $cardFestival['content_cardFestival']; ?></p>
          <!-- Nombre de likes + affiche "like" si $num_likes inférieur ou égal à 1, sinon affiche "likes" -->
          <span class="likes"><?= $num_likes ?><?= $num_likes > 1 ? ' likes' : ' like' ?></span>
         <!-- si l'utilisateur est connecté et qu'il clique sur le bouton, appel de la fonction like() avec les paramètres :
         this(l'élément bouton lui-même), l'ID du festival et l'ID utilisateur -->
          <?php if(isset($_SESSION['user'])) : ?>
            <button class="like-btn" onclick="like(this, '<?= $idCardFestival ?>', '<?= $_SESSION['user']['id_user'] ?>' )">
              <!-- Selon la valeur du "alt", 'unlike' ou 'like' soit on affiche l'image rempli (fill) ou l'image sans remplissage -->
              <img id="iconFest" src="../assets/image/<?= $liked ? 'unlike' : 'like' ?>.png" alt="<?= $liked ? 'unlike' : 'like' ?>">
            </button>
          <?php endif ?>
        </div><!-- flex-container-->
      </div><!-- card-content1 -->
      <!-- form avec TEXTAREA pour les commentaires -->
      <div class="comment_form">
        <form method="POST" action="../controller/festival.php" class="commentForm">
          <label for="content_commentCard" class="festivalComm">Votre commentaire :</label><br>
          <textarea name="content_commentCard" id="content_commentCard"></textarea>
          <input type="text" name="id_cardFestival" id="inputIdFest" value="<?= $cardFestival['id_cardFestival'] ?>"><br>
          <input name="submit" type="submit" value="Envoyer" id="buttonComm">
        </form>
      </div><!-- comment_form -->
    </div><!--card1 -->
  <?php endforeach ?>
</div>

<div id="lien">
  <p>Vous pouvez trouver tous les festivals Européens en suivant ce lien : 
  <a href="https://www.concerts-metal.com/festivals-2024.html" target="_blank">En savoir plus sur les Festivals 2024</a></p>
</div>

<!-- 1 row avec 4 colonnes dont 2 principales : cardAfficheConcert et cardAfficheComment -->
<div class="row">
  <div class="col-lg-4">
      <div id="usersConcert" class="scroll-container">
          <?php foreach ($users as $user) : ?>
              <?php if (isset($user['concerts'])) : ?>
                  <div class="card" id="cardAfficheConcert">
                      <div class="card-header">
                          <img src="<?= getUserImage($bdd, $user['id_user']) ?>" alt="Photo utilisateur" width="50px" height="50px">
                          <h2 class="titreH2"><?= $user['pseudo_user'] ?> : SON TOP 5</h2>
                      </div>
                      <div class="card-body">
                          <?php foreach ($user['concerts'] as $concert) : ?>
                              <p><?= $concert['band_concert'] ?>, <?= $concert['location_concert'] ?>, <?= $concert['year_concert'] ?></p>
                          <?php endforeach; ?>
                      </div><!-- end card-body -->
                  </div><!-- end card -->
              <?php endif; ?>
          <?php endforeach; ?>
      </div><!-- end usersConcert -->
  </div><!-- end col-lg-4 -->
  <div class="col-lg-1"></div>
  <!-- cardAfficheComments avec option de selection pour filtrer des recherches -->
  <div class="col-lg-6">
    <h2 class="festh2">Ils ont voté !!! Voici leurs commentaires :</h2>
    <div>
      <p class="festh2">Tu peux les filtrer ici :</p>
      <form id="comment-filter-form" action="../controller/festival.php" method="post">
        <select id="filter-type" name="filter-type" class="custom-font">
          <option value="cardFestival">Festival</option>
          <option value="pseudo">Pseudo</option>
          <option value="date">Date</option>
        </select>
        <input id="filter-value" type="text" name="filter-value" placeholder="Votre recherche" maxlength="25">
        <button type="submit" id="buttonFiltre">Filtrer</button>
      </form>
    </div>
    <!-- contenu résultat des commentaires : si filtres activés -->
    <div id="cardC" class="scroll-container">
      <?php if (isset($filteredComments)) : ?>
        <?php foreach ($filteredComments as $comment) : ?>
          <div class="card-header">
            <p id="voteFor"><?= $comment['name_cardFestival'] ?></p>
          </div>
          <div class="card-body2">
            <p id="nameUser"><?= $comment['pseudo_user'] ?></p>
            <p><strong>Son commentaire : </strong><span style=""></span><?= $comment['content_commentCard'] ?></p>
            <p>Date: <?= $comment['date_commentCard'] ?></p>
          </div>
        <?php endforeach; ?>
      <?php else : ?>
        <?php foreach ($comments as $comment) : ?>
          <div class="card-header">
            <p id="voteFor"><?= $comment['name_cardFestival'] ?></p>
          </div>
          <div class="card-body2">
            <p id="nameUser"><?= $comment['pseudo_user'] ?></p>
            <p><?= $comment['content_commentCard'] ?></p>
            <p>Date: <?= $comment['date_commentCard'] ?></p>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>

  <div class="col-lg-1"></div>
</div>
