<?php
include_once('../../design/design.php');
Design(__FILE__, 'Vsnippet LFI');

/**
 * YesWeHack - Vulnerable Code Snippet
 */
//Run: php -S 127.1:5000


//Temporary messages to our customers:
echo '
<pre style="font-size:16px;color:red;">
    The website is under development but will be back soon.
</pre>
';

class image {
    public $filename;
    public $path = './assets/';
    public $ext = '.txt';

    function __construct($name) {
        $this->filename = $name;
    }
    function load() {
        echo ($this->path . $this->filename . $this->ext);
        include($this->path . $this->filename . $this->ext);
    }
}

$file = 'message';
if ( isset($_GET['file']) ) {
    $file = str_replace('../', '', $_GET['file']);
    $imgFile = new image($file);
}

$imgFile->load()

?>
