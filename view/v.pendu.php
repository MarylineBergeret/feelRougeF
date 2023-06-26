<!DOCTYPE html>
<html>
<head>
  <title>Jeu du Pendu - Métal Progressif</title>
  
</head>
<body id="bodyPendu">
  <h1 id="h1Pendu">Jeu du Pendu - Métal Progressif</h1>

  <div id="word-container">
    <h2 id="word"></h2>
  </div>

  <div id="guesses-container">
    <h3>Lettres déjà devinées :</h3>
    <p id="guesses"></p>
  </div>

  <div id="wrong-container">
    <h3>Lettres incorrectes : 6 erreurs, pas plus !</h3>
    <p id="wrong"></p>
  </div>

  <div id="image-container">
    <img id="hangman-image" src="../assets/image/rock2.png" alt="Pendu">
  </div>

  <form id="guess-form">
    <label for="guess-input">Devinez une lettre:</label>
    <input type="text" id="guess-input" maxlength="1" autocomplete="off">
    <button type="submit">Soumettre</button>
  </form>


  <script src="../assets/js/pendu.js"></script>
</body>
</html>
