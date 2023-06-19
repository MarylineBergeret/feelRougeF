document.addEventListener('DOMContentLoaded', init);

const words = ['dream theater', 'opeth', 'tool', 'hellfest', 'Pain Of Salvation', 'Transatlantic', 'Shaman Harvest', 'Symphony X', 'haken', 'Iron Maiden', 'Metallica', 'Judas Priest', 'Black Sabbath', 'Megadeth', 'Pantera', 'Slayer', 'Queensrÿche', 'Mastodon', 'Rush', 'Deep Purple', 'Led Zeppelin', 'AC/DC', 'Guns N\' Roses', 'Scorpions'];

let selectedWord;
let guesses = [];
let wrongGuesses = 0;

function init() {
  selectedWord = getRandomWord();
  setupWord();
  document.getElementById('guess-form').addEventListener('submit', handleGuess);
}

function getRandomWord() {
  return words[Math.floor(Math.random() * words.length)];
}

function setupWord() {
  const wordContainer = document.getElementById('word');
  wordContainer.textContent = '';

  for (let i = 0; i < selectedWord.length; i++) {
    const letter = selectedWord[i];
    const span = document.createElement('span');

    if (letter === ' ') {
      span.textContent = ' ';
    } else {
      span.textContent = '_';
    }

    wordContainer.appendChild(span);
  }
}

function handleGuess(event) {
  event.preventDefault();
  const guessInput = document.getElementById('guess-input');
  const guess = guessInput.value.toLowerCase();

  if (guess && guess.length === 1 && /^[a-z]$/.test(guess)) {
    guessInput.value = '';
    checkGuess(guess);
  }
}

function checkGuess(guess) {
    if (guesses.includes(guess)) {
      return;
    }
  
    guesses.push(guess);
    const wordContainer = document.getElementById('word');
    const guessesContainer = document.getElementById('guesses');
    const wrongContainer = document.getElementById('wrong');
    let wordUpdated = false;
  
    for (let i = 0; i < selectedWord.length; i++) {
      if (selectedWord[i] === guess) {
        wordContainer.children[i].textContent = guess;
        wordUpdated = true;
      }
    }
  
    if (!wordUpdated) {
      wrongContainer.textContent += guess + ' ';
      handleWrongGuess();
    } else {
      guessesContainer.textContent += guess + ' ';
    }
  
    checkGameStatus();
  }
  
  

function handleWrongGuess() {
  wrongGuesses++;
  const hangmanImage = document.getElementById('hangman-image');
  hangmanImage.src = `images/${wrongGuesses}.png`;
}

function checkGameStatus() {
  const wordContainer = document.getElementById('word');

  if (wrongGuesses === 6) {
    alert('Vous avez perdu !');
    resetGame();
  } else if (!wordContainer.textContent.includes('_')) {
    alert('Félicitations, vous avez gagné !');
    resetGame();
  }
}

function resetGame() {
  selectedWord = getRandomWord();
  guesses = [];
  wrongGuesses = 0;

  setupWord();

  const hangmanImage = document.getElementById('hangman-image');
  hangmanImage.src = 'images/0.png';
}
