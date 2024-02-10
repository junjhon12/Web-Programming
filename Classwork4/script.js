/**
 * Create a constructor for an object - that will hold movie data
• The object should store the following information about your favorite movie: title (a string), duration (a number), stars (an array of strings), and rating (a number 0-5), viewed ( a Boolean) indicating whether you’ve seen it,
• Create a function called isShortFilm finder, that returns true if the movie has a running time of less than 40 mins
•Create a function called criticsPick– that returns true if the movie is rated higher than a 4, that you haven’t seen before
•Create an array of 5 movies and print out a list of the titles that are short films
Call your functions at the bottom of your script with test data to show that they work by printing the output to console.log. Please leave a link to your html file on the codd server in the text box.
 */

// Class that holds movie data
class Movie {
    constructor(title, duration, stars, rating, viewed) {
        this.title = title;
        this.duration = duration;
        this.stars = stars;
        this.rating = rating;
        this.viewed = viewed;
    }
}

// Creates objects for 5 movies
let movie1 = new Movie('The Martian', 1.44, ['Matt Damon', 'Jessica Chastain', 'Kristen Wiig'], 4.5, true);
let movie2 = new Movie('Limitless', 1.05, ['Bradley Cooper', 'Robert De Niro', 'Abbie Cornish'], 4.5, true);
let movie3 = new Movie('Balance', 0.07, ['Margarita Terekhova', 'Armen Dzhigarkhanyan', 'Alla Demidova'], 3, true);
let movie4 = new Movie('Broker', 2.09, ['Kang-ho Song', 'Sang-kyung Kim', 'Roe-ha Kim'], 4.5, false);
let movie5 = new Movie('Goofy Gymnastics', 0.07, ['Pinto Colvig', 'Walt Disney'], 4.5, false);

// This array holds the 5 movies
const movies = [movie1, movie2, movie3, movie4, movie5];

// Function for finding short films
function isShortFilm() {
    let shortFilms = [];
    for (let movie of movies) {
        if (movie.duration < 0.40) {
            return true;
        }
    }
    return shortFilms;
}

// Function for finding critic's pick
function criticsPick() {
    let criticsPicks = [];
    for (let movie of movies) {
        if (movie.rating > 4 && movie.viewed === false) {
            criticsPicks.push(movie.title);
        }
    }
    return criticsPicks;
}

// Print out the list of short films
console.log("Short films: ", isShortFilm() );
// Print out the list of critic's picks
console.log("Critic's picks: ", criticsPick() );