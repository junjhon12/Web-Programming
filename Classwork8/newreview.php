<?php
session_start();

// Check if the username cookie is set
if (isset($_COOKIE['username'])) {
    $username = $_COOKIE['username'];
} else {
    $username = '';
}

// Check if the streaming platform session variable is set
if (isset($_SESSION['streamingPlatform'])) {
    $streamingPlatform = $_SESSION['streamingPlatform'];
} else {
    $streamingPlatform = 'Select';
}

// Set the streaming platform session variable when the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['streamingPlatform'] = $_POST['streamingPlatform'];
}

// Set the username cookie when the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['reviewerName'])) {
    $username = $_POST['reviewerName'];
    setcookie('username', $username, time() + (86400 * 30), '/'); // Cookie expires in 30 days
    setcookie('artist', $_POST['artistName'], time() + (86400 * 30), '/'); // Cookie expires in 30 days
    setcookie('album', $_POST['albumTitle'], time() + (86400 * 30), '/'); // Cookie expires in 30 days
    setcookie('song', $_POST['songTitle'], time() + (86400 * 30), '/'); // Cookie expires in 30 days
    setcookie('streamingPlatform', $_POST['streamingPlatform'], time() + (86400 * 30), '/'); // Cookie expires in 30 days
    setcookie('rating', $_POST['rating'], time() + (86400 * 30), '/'); // Cookie expires in 30 days
    setcookie('review', $_POST['review'], time() + (86400 * 30), '/'); // Cookie expires in 30 days
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./viewreview.php" method="post">
        <label for="artistName">Artist:</label>
        <input type="text" name="artistName" id="artistName" size="30" required>
        <br>
        <label for="albumTitle">Album Title:</label>
        <input type="text" name="albumTitle" id="albumTitle" size="30" required>
        <br>
        <label for="songTitle">Song Title:</label>
        <input type="text" name="songTitle" id="songTitle" size="30" required>
        <br>
        <label for="reviewerName">Reviewer Name:</label>
        <input type="text" name="reviewerName" id="reviewerName" size="30" value="<?php echo $username; ?>" required>
        <br>
        <label for="streamingPlatform">Streaming Platform:</label>
        <select name="streamingPlatform" id="streamingPlatform" required>
            <option value="Select" <?php if ($streamingPlatform === 'Select') echo 'selected'; ?>>Select</option>
            <option value="Spotify" <?php if ($streamingPlatform === 'Spotify') echo 'selected'; ?>>Spotify</option>
            <option value="Apple Music" <?php if ($streamingPlatform === 'Apple Music') echo 'selected'; ?>>Apple Music</option>
            <option value="Tidal" <?php if ($streamingPlatform === 'Tidal') echo 'selected'; ?>>Tidal</option>
            <option value="Deezer" <?php if ($streamingPlatform === 'Deezer') echo 'selected'; ?>>Deezer</option>
            <option value="Amazon Music" <?php if ($streamingPlatform === 'Amazon Music') echo 'selected'; ?>>Amazon Music</option>
        </select>
        <br>
        <label for="rating">Rating:</label><br>
        <input type="radio" id="rating1" name="rating" value="1" required>
        <label for="rating1">1</label><br>
        <input type="radio" id="rating2" name="rating" value="2">
        <label for="rating2">2</label><br>
        <input type="radio" id="rating3" name="rating" value="3">
        <label for="rating3">3</label><br>
        <input type="radio" id="rating4" name="rating" value="4">
        <label for="rating4">4</label><br>
        <input type="radio" id="rating5" name="rating" value="5">
        <label for="rating5">5</label><br><br>
        <br>
        <label for="review">Review:</label><br>
        <textarea id="review" name="review" rows="4" cols="50" required></textarea><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>