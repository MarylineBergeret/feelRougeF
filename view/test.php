<div id="festival-section" class="container">
    <div class="row">
      <!--boucle foreach pour itérer sur tous les festivals stockés dans la variable $cardfestivals.-->
    <?php foreach($cardFestivals as $festival): ?>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">

               <!-- Affiche le nom et le contenu du festival stocké dans la variable $festival.-->

                    <h5 class="card-title"><?php echo $festival['name_cardfestival']; ?></h5>
                    <p class="card-text"><?php echo $festival['content_cardFestival']; ?></p>
                    <p class="card-text"><?php echo $festival['img_cardFestival']; ?></p>
                    <a href="#" class="card-link">En savoir plus</a>
                </div>
                <!--affiche le nombre de likes pour le festival. La valeur est récupérée depuis la variable $festival['likes_count']. Le texte "likes" est ajouté à la fin de la ligne.-->
                <div class="likes"><?php echo $festival['likes_cardFestival']; ?> likes</div>
               <!--bouton avec icone like avec un id unique pour chanque festival-->
               <i class="fa fa-thumbs-up like-btn" data-id="<?php echo $festival['id_cardFestival']; ?>"></i>
                <!--Cette section affiche les commentaires pour le festival. Les commentaires sont stockés dans la variable $festival['comments'], qui est une liste d'éléments. Pour chaque commentaire, une nouvelle ligne HTML est ajoutée avec l'élément `-->
               <ul class="list-group list-group-flush">
                <?php foreach($festival['commentCard'] as $commentCard): ?>
                    <li class="list-group-item"><?php echo $commentCard['commentCard']; ?></li>
                <?php endforeach; ?>
                </ul>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
</div>

<!-- <script src="path/to/your/vue.js/file"></script>
<script>
import LikeButton from "./components/LikeButton.vue";

export default {
  name: "App",
  components: {
    LikeButton
  },
  data() {
    return {
      festivals: [
        {
          id: 1,
          name: "Festival 1",
          content: "Lorem ipsum dolor sit amet"
          likeCount: 0,
        isLiked: false
        
        },
        {
          id: 2,
          name: "Festival 2",
          content: "Lorem ipsum dolor sit amet"
          likeCount: 0,
        isLiked: false
        
        },
        {
          id: 3,
          name: "Festival 3",
          content: "Lorem ipsum dolor sit amet"
          likeCount: 0,
        isLiked: false
        
        
        }
      ]
    };
  }
};
</script>

<div class="card-list">
    <div class="card" v-for="card in cardFestivals" :key="card.id_cardFestival">
        <div class="card-image">
            <img :src="card.img_cardFestival">
        </div>
        <div class="card-content">
            <h3>{{ card.name_cardFestival }}</h3>
            <p>{{ card.content_cardFestival }}</p>
            <p>{{ card.likes_cardFestival }} likes</p>
        </div>
    </div>
</div>
methods: {
fetchCardFestivals() {
axios.get('/api/cardFestivals').then(response => {
this.cardFestivals = response.data;
});
}
}, -->

