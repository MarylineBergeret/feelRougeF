<!DOCTYPE html>
<html>
<head>
  <title>Jeu du Pendu - Métal Progressif</title>
  <link rel="stylesheet" type="text/css" href="../assets/css/pendu.css">
</head>
<body id="bodyPendu">
  <h1 id="h1Pendu">Jeu du Pendu - Métal Progressif</h1>

  <div id="word-container">
    <h2 id="word"></h2>
  </div>

  <div id="guesses-container">
    <h3>Lettres déjà devinées:</h3>
    <p id="guesses"></p>
  </div>

  <div id="wrong-container">
    <h3>Lettres incorrectes:</h3>
    <p id="wrong"></p>
  </div>

  <div id="image-container">
    <img id="hangman-image" src="images/0.png" alt="Pendu">
  </div>

  <form id="guess-form">
    <label for="guess-input">Devinez une lettre:</label>
    <input type="text" id="guess-input" maxlength="1" autocomplete="off">
    <button type="submit">Soumettre</button>
  </form>


  <script src="../assets/js/pendu.js"></script>
</body>
</html>
