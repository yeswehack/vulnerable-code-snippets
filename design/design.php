<?php
/** View source code of the file that is being analyzed.
 * This code is never a part of the vulnerable code snippet.
 */

function Design($f, $t) {
    /**Outout the source code of "x" V-snippet*/
    $FileToShow = file_get_contents($f);


    ini_set("highlight.comment", "#008000");
    ini_set("highlight.default", "#efa743");
    ini_set("highlight.html", "#808080");
    ini_set("highlight.keyword", "#318fca; font-weight: bold");
    ini_set("highlight.string", "#81481f");


    echo '<!DOCTYPE html>
    <html>
    <head>
        <title>'.htmlspecialchars($t).'</title>
    </head>
    <body>
    <h1> #'.htmlspecialchars($t).'</h1>
    <style>', include('design.css'), '</style>
    <div id="Vcode">', (highlight_string($FileToShow, true)) ,'</div>
    </body>
    </html>';
}

?>
