<?php
// Challenge 7: Path Traversal to access the flag in /flag.txt
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['file'])) {
        $file = $_GET['file'];

        include($file);
    } else {
        // redirect to get the file welcome
        header('Location: ?file=welcome.txt');
    }
}
