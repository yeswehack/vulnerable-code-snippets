<?php
include_once('./ignore/design/design.php');
$title = 'Vsnippet #31 - Local File Inclusion (LFI)';
$design = Design(__FILE__, $title);

/**
 * YesWeHack - Vulnerable Code Snippet
 */

//Temporary messages to our customers:
echo '
<pre style="font-size:16px;color:red;">
    The website is under development but will be back soon.
</pre>
';

class Msg {
    public $filename;
    public $path = './assets/';
    public $ext = '.txt';

    function __construct($f) {
        $this->filename = $f;
    }
    function load() {
        echo "<p>" . ($this->path . $this->filename . $this->ext ) ."</p>";//<- DEBUG (mainly for help analyse how your input is filtered)
        include($this->path . $this->filename . $this->ext);
    }
}

$file = 'message';
if ( isset($_GET['file']) ) {
    $file = str_replace('../', '', $_GET['file']);
}
$msgFile = new Msg($file);
$msgFile->load();

?>

<html>
<head>
<title><?= $title ?></title>
</head>
<body>
<div>
<?= $design ?>
</div>
<body>
</html>