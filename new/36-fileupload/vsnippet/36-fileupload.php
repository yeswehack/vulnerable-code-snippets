<?php
//Ignore the design setup below:
include_once('./ignore/design/design.php');
$title = 'Vsnippet #36 - Unrestricted File Upload Vulnerability';
$design = Design(__FILE__, );

/*
* YesWeHack - Vulnerable Code Snippet
*/

function showImage($imageName) {
    return base64_encode(file_get_contents($imageName));
}
function UploadImage($f) : string {
    if ( !isset($f) || preg_match('/\.(jpg|jpeg|png)/', $f["name"]) !== 1) {
        echo "Invalid image given!";
        die();
    }
    //Change the filename and verify the full path to store the profile image:
    $file = "uploads/".basename($f["name"]);

    //Upload the file to the given directory
    if ( !move_uploaded_file($f["tmp_name"], $file) ) {
        echo "Failed! (unkown)";
    }
    return $file;
}

// Check if image file is a actual image or fake image
if( isset($_POST["submit"])) {
    $imageName = UploadImage($_FILES["profileImage"]);
    echo "New profile picture \"".htmlspecialchars($imageName)."\" has been successfully uploaded!";
} else {
    $imageName = "uploads/default.jpg";
}
?>

<html>
<title><?= $title ?></title>
<body>
<h1><?= $title ?></h1>

<img id="profilePicture" src="data:image/png;base64,<?= showImage($imageName) ?>">

<div>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="upload">Upload your profile picture! (jpeg/png)</label>
        <input type="file" id="profileImage" name="profileImage">
        <input type="submit" value="Submit" name="submit">
    </form>
</div>

<div>
<?= $design ?>
</div>
<body>
</html>
