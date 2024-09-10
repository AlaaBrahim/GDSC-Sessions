<?php
session_start();
// Challenge 4: Reflected XSS
if (isset($_GET['search'])) {
    echo 'Search results for: ' . $_GET['search'];
}
?>
<form action="" method="GET">
    <label for="search">Search:</label>
    <input type="text" name="search" id="search">
    <input type="submit" value="Submit">
</form>