<?php
//Ignore the design setup below:
include_once('./ignore/design/design.php');
$title = 'Vsnippet #36 - Unrestricted File Upload Vulnerability';
$design = Design(__FILE__, );

/*
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


<center>
<label>Game4Hack3r$</label><br>
<textarea type="text" id="username" placeholder="your username..."></textarea><br>
<input id="btn" type="submit" value="START">

<p id="out">Connected to game server address: </p>
</center>
<script>
  //Get game server address:
  console.log("Waiting for connection...")
  window.addEventListener("message", (event)=>{
    console.log("[OK] Connected!")
    address = event.data
    document.getElementById('out').innerHTML += `<u>${address}</u>`
  });

  //Code...
</script>

<div>
<?= $design ?>
</div>
</body>
</html>
