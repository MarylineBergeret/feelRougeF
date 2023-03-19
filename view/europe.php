<!DOCTYPE html>
<html>
<head>
	<title>Card Festivals</title>
	<script src="https://cdn.jsdelivr.net/npm/vue"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
	<style>
		.card {
			border: 1px solid #ccc;
			border-radius: 5px;
			padding: 10px;
			margin: 10px;
			width: 300px;
			display: inline-block;
			vertical-align: top;
		}
		.card img {
			max-width: 100%;
			height: auto;
			margin-bottom: 10px;
		}
		.card .title {
			font-size: 18px;
			font-weight: bold;
			margin-bottom: 10px;
		}
		.card .content {
			font-size: 14px;
			margin-bottom: 10px;
		}
		.card .like {
			font-size: 18px;
			color: gray;
			cursor: pointer;
			margin-right: 10px;
		}
		.card .like.active {
			color: red;
		}
		.card .likes {
			font-size: 14px;
			color: gray;
			margin-bottom: 0;
		}
	</style>
</head>
<body>
	<div id="app">
		<div v-for="cardFestival in cardFestivals" class="card">
			<img v-bind:src="cardFestival.img_cardFestival" alt="">
			<div class="title">{{ cardFestival.name_cardFestival }}</div>
			<div class="content">{{ cardFestival.content_cardFestival }}</div>
			<div class="likes">{{ cardFestival.likes_cardFestival }} likes</div>
			<div v-bind:class="{ 'like': true, 'active': cardFestival.liked }" v-on:click="toggleLike(cardFestival)">
				<i class="fas fa-heart"></i>
			</div>
		</div>
	</div>

	<script>
		var app = new Vue({
			el: '#app',
			data: {
				cardFestivals: [],
			},
			methods: {
				toggleLike: function(cardFestival) {
					if (!cardFestival.liked) {
						cardFestival.likes_cardFestival++;
						cardFestival.liked = true;
						// appel à l'API pour ajouter un like dans la base de données
					} else {
						cardFestival.likes_cardFestival--;
						cardFestival.liked = false;
						// appel à l'API pour supprimer un like dans la base de données
					}
				}
			},
			mounted: function() {
				// appel à l'API pour récupérer les card
