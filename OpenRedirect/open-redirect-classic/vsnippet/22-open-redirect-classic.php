<?php
//The PHP code can be ignored. It's just for design purpose.
include_once('./ignore/design/design.php');
$title = 'Vsnippet #22 - Open Redirect Classic';
$design = Design(__FILE__, $title);

/**
* YesWeHack - Vulnerable Code Snippet
*/
?>

<!DOCTYPE html>
<html>
    <head>
      <title><?= $title ?></title>
    </head>
<body>
<h1><?= $title ?></h1>
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
<div>
<?= $design ?>
</div>
</body>
</html>
