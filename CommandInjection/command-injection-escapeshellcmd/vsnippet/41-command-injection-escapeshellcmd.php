<?php
//Ignore the design setup below:
include_once('./ignore/design/design.php');
$title = 'Vsnippet #36 - Unrestricted File Upload Vulnerability';
$design = Design(__FILE__);

/*
* YesWeHack - Vulnerable Code Snippet
*/
?>

<?php
if ( isset($_POST['markdown']) && isset($_POST['convert']) ) {
    $convert = ( strlen($_POST['convert']) > 0 ) ? $_POST['convert'] : 'html';

    file_put_contents('markdown.md', $_POST['markdown']);
    echo shell_exec("pandoc markdown.md -t ". escapeshellcmd($convert) ." -o ./files/converted");
    unlink('markdown.md');
}
?>

<html>
<title><?= $title ?></title>
<body>
<h1><?= $title ?></h1>
<center>
<h1>Convert markdown to HTML</h1>
<div>
    <form id="convertForm" action="" method="POST" enctype="multipart/form-data">
        <textarea form="convertForm" rows="16" cols="70" type="text" name="markdown"></textarea><br>
        <input type="text" name="convert" placeholder="convert to... (Ex: html)"><br>
        <input type="submit" name="submit" value="Convert to HTML">
    </form>
</div>

<h1> Converted File Output </h1>
<iframe id="output" src="/files/converted"></iframe>
</center>

<div>
<?= $design ?>
</div>
<style>
#output {
    background: #FFFFFF;
    border: solid 3px #09d8c4;
    border-radius: 22px;
    width: 500px;
    height: 420px;
} 
</style>
<body>
</html>



