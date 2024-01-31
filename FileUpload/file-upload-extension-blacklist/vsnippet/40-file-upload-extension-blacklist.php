<?php
//Ignore the design setup below:
include_once('./ignore/design/design.php');
$title = 'Vsnippet #40 - File Upload extension blacklist';
$design = Design(__FILE__);

/*
* YesWeHack - Vulnerable Code Snippet
*/
?>

<?php
$target_dir = "uploads/";
$blacklist_ext = ["php", "php4", "php5", "phtm", "phtml", "phar"];

// Check if the client tries to upload a new document to be shared with others:
if( $_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["submit"]) ) {
    $target_file = $target_dir . basename($_FILES["filedoc"]["name"]);

    $ext = strtolower(  pathinfo($target_file, PATHINFO_EXTENSION) );

    if ( in_array($ext, $blacklist_ext) ) {
        echo "You got caught!";
        die();
    }

    //Upload the file to the given directory
    if ( move_uploaded_file($_FILES["filedoc"]["tmp_name"], $target_file) ) {
        echo 'The document was uploaded successfully : ' . htmlspecialchars($target_file);
    }
}
?>

<html>
<title><?= $title ?></title>
<body>
<h1><?= $title ?></h1>

<div>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="upload">Upload your document</label>
        <input type="file" id="filedoc" name="filedoc">
        <input type="submit" name="submit" value="Upload">
    </form>
</div>

<div>
<?= $design ?>
</div>
<body>
</html>



