/**
 * Create a constructor for an object - that will hold movie data
• The object should store the following information about your favorite movie: title (a string), duration (a number), stars (an array of strings), and rating (a number 0-5), viewed ( a Boolean) indicating whether you’ve seen it,
• Create a function called isShortFilm finder, that returns true if the movie has a running time of less than 40 mins
•Create a function called criticsPick– that returns true if the movie is rated higher than a 4, that you haven’t seen before
•Create an array of 5 movies and print out a list of the titles that are short films
Call your functions at the bottom of your script with test data to show that they work by printing the output to console.log. Please leave a link to your html file on the codd server in the text box.
 */

// Constructor that holds movie data
function Movie(title, duration, stars, rating, viewed) {
    this.title = title;
    this.duration = duration;
    this.stars = stars;
    this.rating = rating;
    this.viewed = viewed;
}

// Creates objects for 5 movies
movie1 = new Movie('The Martian', 1.44, ['Matt Damon', 'Jessica Chastain', 'Kristen Wiig'], 4.5, true);
movie2 = new Movie('Limitless', 1.05, ['Bradley Cooper', 'Robert De Niro', 'Abbie Cornish'], 4.5, true);
movie3 = new Movie('Balance', .07, ['Margarita Terekhova', 'Armen Dzhigarkhanyan', 'Alla Demidova'], 4.5, true);
movie4 = new Movie('Broker', 2.09, ['Kang-ho Song', 'Sang-kyung Kim', 'Roe-ha Kim'], 4.5, true);
movie5 = new Movie('Goofy Gymnastics', .07, ['Pinto Colvig', 'Walt Disney'], 4.5, true);

// This array holds the 5 movies
const movies = [movie1, movie2, movie3, movie4, movie5];

// Function for finding short films
function isShortFilmFinder() {
    let shortFilms = [];
    for (let i = 0; i < movies.length; i++) {
        if (movies[i].duration < .40) {
            shortFilms.push(movies[i].title);
        }
    }
    return shortFilms;
}