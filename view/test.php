<div id="festival-section" class="container">
    <div class="row">
    <?php foreach($cardfestivals as $festival): ?>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                <!--<div v-for="festival in festivals" :key="festival.id" class="col-md-4">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">{{ festival.name }}</h5>
      <p class="card-text">{{ festival.content }}</p>
      <like-button :like-count="festival.likeCount" :is-liked="festival.isLiked" @liked="updateLikeStatus($event, festival)"></like-button>
    </div>
  </div>
</div>-->
                    <h5 class="card-title"><?php echo $festival['name_cardfestival']; ?></h5>
                    <p class="card-text"><?php echo $festival['content_cardfestival']; ?></p>
                    <a href="#" class="card-link">En savoir plus</a>
                </div>
                <div class="likes"><?php echo $festival['likes_count']; ?> likes</div>
          <i class="fa fa-thumbs-up like-btn" data-id="<?php echo $festival['id_cardfestival']; ?>"></i>
                <ul class="list-group list-group-flush">
                <?php foreach($festival['commentaires'] as $comment): ?>
                    <li class="list-group-item"><?php echo $comment['content_commentaire']; ?></li>
                <?php endforeach; ?>
                </ul>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
</div>

<script src="path/to/your/vue.js/file"></script>
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