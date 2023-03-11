<template>
  <div>
    <button @click="like" :class="{ 'liked': isLiked }">
      <i class="fa fa-heart"></i>
      {{ likeCount }}
    </button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      isLiked: false,
      likeCount: 0
    };
  },
  methods: {
    like() {
      if (!this.isLiked) {
        this.likeCount++;
        this.isLiked = true;
      } else {
        this.likeCount--;
        this.isLiked = false;
      }
    }
  }
};
</script>
