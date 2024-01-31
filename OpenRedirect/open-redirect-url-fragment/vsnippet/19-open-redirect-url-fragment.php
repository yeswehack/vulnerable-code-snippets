<?php
//The PHP code can be ignored. It's just for design purpose.
include_once('./ignore/design/design.php');
$title = 'Vsnippet #19 - Open Redirect Classic';
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
<ul>
    <!-- Customer mode -->
    <li><a href="#light">☀️ Light</a></li>
    <li><a href="#dark">🌘 Dark</a></li>
</ul>
<pre>New feature is out!</pre>
<script>
setInterval( () => {
    m = (location.hash).split('#')[1] ?? 'dark';
    b = document.body.style;
    if ( m == "light" ) {
        b.backgroundColor = "#fff";
        b.color =  "#000";
                        
    } else if ( m == "dark" ) {
        b.backgroundColor = "#000";
        b.color =  "#fff"

    } else {
        location.href = "/" + m;
    }
}, 300);
</script>
<div>
<?= $design ?>
</div>
</body>
</html>
