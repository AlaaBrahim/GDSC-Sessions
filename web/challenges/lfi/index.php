<!-- upload file to uploads folder -->
<h1>Upload file</h1>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="file" id="file">
    <input type="submit" value="Upload">
</form>
<br>
<br>
<br>

<h1>Change Language</h1>
<!-- select language-->
<form action="" method="GET">
    <label for="language">Select language:</label>
    <select name="language" id="language">
        <option value="en">English</option>
        <option value="fr">French</option>
    </select>
    <input type="submit" value="Submit">

    <?php
    // save the uploaded file
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_FILES["file"])) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["file"]["name"]);
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["file"]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    echo "<br>";
    echo "<br>";
    echo "<br>";
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        if (isset($_GET['language'])) {
            $language = $_GET['language'];
            include $language . '.php';
        }
    }
