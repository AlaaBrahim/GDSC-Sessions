<?php
session_start();
// Challenge 5: Stored XSS in comments
// get comments from file
$comments = [];
if (file_exists('comments.txt')) {
    $comments = unserialize(file_get_contents('comments.txt'));
} else {
    file_put_contents('comments.txt', serialize($comments));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comment = $_POST['comment'];
    // Save the comment
    $comments[] = $comment;
    file_put_contents('comments.txt', serialize($comments));
    echo 'Comment saved!';
}

?>
<h1>Add comment</h1>
<form action="" method="POST">
    <label for="comment">Comment:</label>
    <input type="text" name="comment" id="comment">
    <input type="submit" value="Submit">
</form>

<h2>Comments</h2>
<ul>
    <?php

    // Display existing comments
    foreach ($comments as $c) {
        echo '<li>' . $c . '</li>';
    }
    ?>
</ul>