<?php
// Challenge 6: Command Injection via a ping website helper
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $website = $_POST['website'];
    $output = shell_exec('ping -c 1 ' . $website);
    echo '<pre>' . $output . '</pre>';
}
?>
<form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <label for="website">Ping Website:</label>
    <input type="text" name="website" id="website">
    <input type="submit" value="Submit">
</form>