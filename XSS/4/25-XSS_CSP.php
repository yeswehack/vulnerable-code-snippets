<?php

/**
* YesWeHack - Vulnerable Code Snippet
*/

function GetNonce() {
    return base64_encode(random_bytes(20));
}

$nonce = GetNonce();
header("Content-Security-Policy: script-src 'nonce-$nonce'");

include_once('../../design/design.php');//<-ignore (Design only)
Design(__FILE__, '25 - VSnippet');//<-ignore (Design only)
?>

<!DOCTYPE html>
<html>
    <head>
    <title>25 - XSS (CSP Bypass)</title>
    </head>
<body>

<p><?= ( isset($_GET["message"]) ) ? $_GET["message"] : 'session expired' ?></p>

<input type="hidden" id="host" value="<?= $_SERVER['HTTP_HOST'] ?>">

<script nonce="<?= $nonce ?>">
   const URLparams = new URLSearchParams(window.location.search);
   const logout = URLparams.get('logout') || false;
    if ( logout ) {
        const host = document.querySelector('#host').value;
        const scrptTag = document.createElement('script');

        scrptTag.nonce = document.currentScript.nonce;
        scrptTag.src = ("//" + host + '/checkLogout.js');
        
        document.body.appendChild(scrptTag);
    }   
</script>
</body>
</html>
