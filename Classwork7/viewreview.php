<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $artist = $_POST["artistName"];
        $album_title = $_POST["albumTitle"];
        $song_title = $_POST["songTitle"];
        $reviewer_name = $_POST["reviewerName"];
        $streaming_platform = $_POST["streamingPlatform"];
        $rating = $_POST["rating"];
        $review = $_POST["review"];

        if ($artist && $album_title && $song_title && $reviewer_name && $streaming_platform && $rating && $review) {
            echo "<h2>Thank you for entering a review!</h2>";
            echo "<p><strong>Artist:</strong> $artist</p>";
            echo "<p><strong>Album Title:</strong> $album_title</p>";
            echo "<p><strong>Song Title:</strong> $song_title</p>";
            echo "<p><strong>Reviewer Name:</strong> $reviewer_name</p>";
            echo "<p><strong>Streaming Platform:</strong> $streaming_platform</p>";
            echo "<p><strong>Rating:</strong> $rating</p>";
            echo "<p><strong>Review:</strong> $review</p>";
        } else {
            echo "<h2>Sorry! You didn’t complete the form. Please try again.</h2>";
            echo "<p><a href='newreview.html'>Go back to the review form</a></p>";
        }
    } else {
        echo "<p>Sorry, something went wrong. Please try again later.</p>";
    }
    ?>
</body>
</html>