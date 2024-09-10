<?php
// Challenge 1: GET & Post Requests with specific data
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo '<h1>GET Request</h1>';
    if (isset($_GET['gdsc']) && $_GET['gdsc'] === 'best_gdsc_ever') {
        readfile('flag1.txt');
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo '<h1>POST Request</h1>';
    if (isset($_POST['web']) && $_POST['web'] === 'ezpz_web') {
        readfile('flag2.txt');
        exit;
    }
}

// This part of the code will print the source code of this file, this is not a part of the challenge
// Get the current file name
$currentFile = basename(__FILE__);

// Function to display the code of the current file
function displayCode($file)
{
    highlight_file($file);
}

// Check if the button is clicked
if (isset($_POST['showCode'])) {
    // Display the code of the current file
    highlight_file($currentFile);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Code Example</title>
</head>

<body>
    <h1>Show Code of Current File</h1>

    <!-- Button to show code -->
    <form method="post">
        <input type="submit" name="showCode" value="Show Code">
    </form>

    <!-- Display the code if the button is clicked -->
    <?php
    if (isset($_POST['showCode'])) {
        echo '<h2>Code of ' . $currentFile . '</h2>';
        displayCode($currentFile);
    }
    ?>
</body>

</html>