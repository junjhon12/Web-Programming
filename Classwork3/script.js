
/*
var wordLetters, guessedLetters, tries;
// Fetch a random word from the API
fetch('https://random-word-api.herokuapp.com/word?number=1')
  .then(response => response.json())
  .then(data => {
    // Convert the word to an array of uppercase letters
    wordLetters = data[0].toUpperCase().split('');
    // Create an array of underscores with the same length as the word
    guessedLetters = new Array(wordLetters.length).fill('_');
    // Reset the number of tries
    tries = 0;

    // Ask the user for input until the word is guessed or the user cancels the game
    // Show the user the number of tries left
    while (guessedLetters.includes('_') && tries < Math.ceil(wordLetters.length/2)) {
      console.log('You have ' + (Math.ceil(wordLetters.length/2) - tries) + ' tries left.');
      var guess = prompt('Guess a letter');
      // User cancel
      if (guess === null) {
        console.log('Game canceled by the user.');
        break;
      }
      guessLetter(guess.toUpperCase());
    }

    // Display the word even if the user cancels the game
    console.log('The word was: ' + wordLetters.join(''));
  })
  .catch(error => console.error('Error:', error));

function guessLetter(letter) {
    var goodGuess = false;
    var moreToGuess = false;
    // Check if the letter is in the word
    for (var i = 0; i < wordLetters.length; i++) {
        // If the letter is in the word
        if (wordLetters[i] == letter) {
            guessedLetters[i] = letter;
            goodGuess = true;
        }
        // If there are still letters to guess
        if (guessedLetters[i] == '_') {
            moreToGuess = true;
        }
    }
    // Print the current state of the guessed letters
    console.log('Current guessed letters: ' + guessedLetters.join(''));
    // If guessed correctly
    if (goodGuess) {
        console.log('Correct');
    } else { // If guessed incorrectly
        console.log('Wrong');
        tries++;
    } // If no more letters to guess
    if (!moreToGuess) {
        console.log('Congratulations! You won!');
    }
    // If the user has tried too many times
    if (tries >= Math.ceil(wordLetters.length/2)) {
        console.log('Sorry, you lost.');
    }
} */

/*
Make it more like Wheel of Fortune:
Start with a reward amount of $0
Every time a letter is guessed, generate a random amount and reward the user if they found a letter (multiplying the reward if multiple letters found), otherwise subtract from their reward.
When they guess the word, log their final reward amount.
*/

var wordLetters, guessedLetters, tries, reward;

// Fetch a random word from the API

fetch('https://random-word-api.herokuapp.com/word?number=1')
  .then(response => response.json())
  .then(data => { 
      // Convert the word to an array of uppercase letters
      wordLetters = data[0].toUpperCase().split('');
      // Create an array of underscores with the same length as the word
      guessedLetters = new Array(wordLetters.length).fill('_');
      // Reset the number of tries
      tries = 0;
      reward = 0;
      // Ask the user for input until the word is guessed or the user cancels the game
      // Show the user the number of tries left
      while (guessedLetters.includes('_') && tries < Math.ceil(wordLetters.length/2)) {
        console.log('You have ' + (Math.ceil(wordLetters.length/2) - tries) + ' tries left.');
        var guess = prompt('Guess a letter');
        // User cancel
        if (guess === null) {
          console.log('Game canceled by the user.');
          break;
        }
        guessLetter(guess.toUpperCase());
      }
      // Display the word even if the user cancels the game
      console.log('The word was: ' + wordLetters.join(''));
      console.log('Your reward amount is: $' + reward);
    })

  .catch(error => console.error('Error:', error));
function guessLetter(letter) {
    var goodGuess = false;
    var moreToGuess = false;
    var rewardAmount = Math.floor(Math.random() * 100);
    // Check if the letter is in the word
    for (var i = 0; i < wordLetters.length; i++) {
        // If the letter is in the word
        if (wordLetters[i] == letter) {
            guessedLetters[i] = letter;
            goodGuess = true;
            reward += rewardAmount;
        }
        // If there are still letters to guess
        if (guessedLetters[i] == '_') {
            moreToGuess = true;
        }
    }
    // Print the current state of the guessed letters
    console.log('Current guessed letters: ' + guessedLetters.join(''));
    // If guessed correctly
    if (goodGuess) {
        console.log('Correct');
    } else { // If guessed incorrectly
        console.log('Wrong');
        reward -= rewardAmount;
        tries++;
    } // If no more letters to guess
    if (!moreToGuess) {
        console.log('Congratulations! You won!');
    }
    // If the user has tried too many times
    if (tries >= Math.ceil(wordLetters.length/2)) {
        console.log('Sorry, you lost.');
    }
}
