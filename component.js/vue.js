Vue.component('card-festivals', {
  template: `
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
  `,
  data() {
      return {
          cardFestivals: []
      }
  },
  created() {
      axios.get('/api/cardFestivals').then(response => {
          this.cardFestivals = response.data;
      });
  }
});

