
    <div id="festival">
    <!-- Afficher chaque carte avec une icône "like" -->
    <?php foreach ($cardFestivals as $cardFestival) { ?>
        <div class="card1">
            <h2><?php echo $cardFestival['name_cardFestival']; ?></h2>
            <div class="card-content">
                
                <img src="<?php echo $cardFestival['img_cardFestival']; ?>" class="imgCard" alt="festival" width="300px">
                <p><?php echo $cardFestival['content_cardFestival']; ?></p>
                <span class="likes"><?php echo $cardFestival['likes_cardFestival']; ?> likes</span>
                <button class="like-btn" data-card-id="<?php echo $cardFestival['likes_cardFestival']; ?>">Like</button>
            </div>
        </div>
    <?php } ?>
    </div>
<!-- Ajouter du code JavaScript pour gérer les clics sur l'icône "like" -->
<script></script>
    

