<?php
//The PHP code can be ignored. It's just for design purpose.
include_once('../../design/design.php');
Design(__FILE__, '22-OpenRedirect');

/**
* YesWeHack - Vulnerable Code Snippet
*
* Start: php -S 127.1:5000
*/
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
<b>If you do not redirect click <a style="color:red;" href="/home.html">here</a></b>
<script>
    function filter(s) {
        return s.replace(/[\.@\/]/g, "_")
    }

    var urlParams = new URLSearchParams(window.location.search);
    var path = urlParams.get('r') ?? '';

    if ( path != '' ) {
        location = filter(path);
    }
</script>
</body>
</html>
