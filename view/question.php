<!DOCTYPE html>
<html>
<head>
	<title>Questionnaire sur la musique métal</title>
</head>
<body>
	<h1>Questionnaire sur la musique métal</h1>
	<form action="submit.php" method="post">
		<label for="genre">1. Quel est votre sous-genre de musique métal préféré ?</label><br>
		<input type="radio" name="genre" value="Heavy metal"> Heavy metal<br>
		<input type="radio" name="genre" value="Thrash metal"> Thrash metal<br>
		<input type="radio" name="genre" value="Death metal"> Death metal<br>
		<input type="radio" name="genre" value="Black metal"> Black metal<br>
		<input type="radio" name="genre" value="Autre"> Autre (veuillez préciser) <input type="text" name="genre_autre"><br>

		<label for="temps">2. Combien de temps écoutez-vous de la musique métal chaque jour ?</label><br>
		<input type="radio" name="temps" value="Moins d'une heure"> Moins d'une heure<br>
		<input type="radio" name="temps" value="Entre une et deux heures"> Entre une et deux heures<br>
		<input type="radio" name="temps" value="Entre deux et trois heures"> Entre deux et trois heures<br>
		<input type="radio" name="temps" value="Plus de trois heures"> Plus de trois heures<br>

		<label for="groupe">3. Pouvez-vous citer un groupe de musique métal que vous appréciez particulièrement ?</label><br>
		<input type="text" name="groupe"><br>

		<label for="element">4. Quel est selon vous l'élément le plus important dans la musique métal ?</label><br>
		<input type="radio" name="element" value="Les paroles"> Les paroles<br>
		<input type="radio" name="element" value="Les riffs de guitare"> Les riffs de guitare<br>
		<input type="radio" name="element" value="La voix du chanteur"> La voix du chanteur<br>
		<input type="radio" name="element" value="L'énergie de la performance en live"> L'énergie de la performance en live<br>

		<label for="distinction">5. Pouvez-vous expliquer ce qui distingue le metal du heavy metal ?</label><br>
		<textarea name="distinction" rows="5" cols="50"></textarea><br>

		<label for="experience">6. Avez-vous assisté à un concert de musique métal ? Si oui, pouvez-vous partager votre expérience ?</label><br>
		<textarea name="experience" rows="5" cols="50"></textarea><br>

		
