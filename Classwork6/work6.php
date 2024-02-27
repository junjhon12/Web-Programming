
<?php 

/*
* Exercise 1: 
* Write a function named hello_world that * * prints the following to a web page: Hello * world!
*/
function hello_world() {
    echo "Hello world!";
}
hello_world();

/**
 * Exercise 2: 
 * Write a function named triangle that accepts an integer parameter representing a size in characters,
 * and prints to the console a right-aligned right triangle figure whose non-hypotenuse sides are that length.
 */
function triangle($size) {
    for ($i = 0; $i < $size; $i++) {
        for ($j = 0; $j < $size - $i; $j++) {
            echo " ";
        }
        for ($j = 0; $j <= $i; $j++) {
            echo "*";
        }
        echo "\n";
    }
}
triangle(5);

/*
Exercise 3: 
Write a function named word_count that accepts a string as its parameter and returns the number of words in the string. A word is a sequence of one or more non-space characters (any character other than ' '). For example, the call of word_count("hello, how are you?") should return 4.  Do not use the String function explode on this problem.  But you can declare as many simple variables like Integer, String, etc. as you like. Print out your phrase and the word count to the webpage.Exercise 3: 
Write a function named word_count that accepts a string as its parameter and returns the number of words in the string. A word is a sequence of one or more non-space characters (any character other than ' '). For example, the call of word_count("hello, how are you?") should return 4.  Do not use the String function explode on this problem.  But you can declare as many simple variables like Integer, String, etc. as you like. Print out your phrase and the word count to the webpage.
 */
function word_count($str) {
    $count = 0;
    $inWord = false;
    for ($i = 0; $i < strlen($str); $i++) {
        if ($str[$i] != ' ') {
            if (!$inWord) {
                $count++;
                $inWord = true;
            }
        } else {
            $inWord = false;
        }
    }
    echo "The phrase is: " . $str . "<br>";
    echo "The word count is: " . $count;
}
word_count("hello, how are you?");

/*
Exercise 4: 
Write a function countWords($str) that takes any string of characters and finds the number of times each word occurs. You should ignore the distinction between capital and lowercase letters, and do not have to worry about dealing with characters that are not letters. Hint: Create an associative array mapping word keys to the number of times they occur. You will need to look at PHP's string functions to split a sentence into words. Hint 2: The print_r($array_name) function is useful for examining the contents of an array. Print out the associative array to the webpage.
*/
function countWords($str) {
    # explode will split the string into an array of words
    $words = explode(" ", strtolower($str));
    $wordCount = array();
    foreach ($words as $word) {
        if (array_key_exists($word, $wordCount)) {
            $wordCount[$word]++;
        } else {
            $wordCount[$word] = 1;
        }
    }
    print_r($wordCount);
}
countWords("hello, how are you? Hello, how are you?");

/*
 Exercise 5: 
Write a function named remove_all that accepts a string and a character as parameters, and removes all occurrences of the character. For example, the call of remove_all("Summer is here!", 'e') should return "Summr is hr!". Do not use the string replace function in your solution. Print the phrase to your webpage before and after you remove the characters.
 */
function remove_all($str, $char) {
    $newStr = "";
    for ($i = 0; $i < strlen($str); $i++) {
        if ($str[$i] != $char) {
            $newStr .= $str[$i];
        }
    }
    echo "The phrase is: " . $str . "<br>";
    echo "The phrase after removing all " . $char . "'s is: " . $newStr;
}
remove_all("Summer is here!", 'e');

?>