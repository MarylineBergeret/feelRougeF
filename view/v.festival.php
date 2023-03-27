  <h2></h2>
  <div id="festival">
  <!-- Afficher chaque carte avec une icône "like" -->
  <?php foreach ($cardFestivals as $cardFestival) { ?>
    <div class="card1">
      <h2><?php echo $cardFestival['name_cardFestival']; ?></h2>
      <div class="card-content1">    
          <img src="<?php echo $cardFestival['img_cardFestival']; ?>" class="imgCard" alt="festival" width="300px">
          <p><?php echo $cardFestival['content_cardFestival']; ?></p>
          <span class="likes"><?php echo $cardFestival['likes_cardFestival']; ?> likes</span>
          <button class="like-btn" data-card-id="<?php echo $cardFestival['id_cardFestival']; ?>">Like</button>
      </div>  
      <div class="comment_form">
        <form method="POST" action="../controller/festival.php" class="comment_form">
          <label for="commentaire">Votre commentaire :</label><br>
          <textarea name="content_commentCard" id="content_commentCard"></textarea>
          <input type="hidden" name="id_cardFestival" value="<?php echo $cardFestival['id_cardFestival']; ?>"><br>
          <input type="submit" value="Envoyer">
        </form>
      </div>             
    </div>
  <?php } ?>
  </div>

    <div id="lien">
      <p>Vous pouvez trouver tous les festivals Européens en suivant ce lien : </p>
        <a href="https://www.concerts-metal.com/festivals.html" target="_blank">En savoir plus sur les Festivals 2023</a>
    </div>
    <div class="comments">
    <?php foreach ($cardFestival['content_commentCard'] as $comment) { ?>
      <div class="comment">
        <p class="comment-content"><?php echo $comment['content_commentCard']; ?></p>
        <span class="comment-date"><?php echo $comment['date_commentCard']; ?></span>
      </div>
    <?php } ?>
    </div>
    <div>
      <img src="https://media.giphy.com/media/n4fQFQVUl0Iu5fi9WW/giphy.gif" alt="hellfest">
    </div>

  <!-- Code JavaScript pour gérer les clics sur l'icône "like" -->

      <script>
  // récupérer tous les boutons "like-btn"
  const likeBtns = document.querySelectorAll(".like-btn");

  // ajouter un écouteur d'événement click à chaque bouton
  likeBtns.forEach(btn => {
    btn.addEventListener("click", () => {
      // récupérer l'id de la carte à partir de l'attribut "data-card-id"
      let id_cardFestival = btn.getAttribute("data-card-id");

      // envoyer une requête AJAX au serveur pour mettre à jour le nombre de likes
      fetch(`../controller/festival.php?id_cardFestival=${id_cardFestival}`)
        .then(response => response.json())
        .then(data => {
          // mettre à jour le nombre de likes affiché sur la page
          const likesElement = btn.parentNode.querySelector(".likes");
          likesElement.textContent = `${data.likes} likes`;
        })
        .catch(error => console.log(error));
    });
  });

  </script>
    

