<?php
//Ignore the design setup below:
include_once('./ignore/design/design.php');
$title = 'Vsnippet #10 - Cross Site Scripting (XSS) string outbreak (PHP v8.0)';
$design = Design(__FILE__, );

/*
* YesWeHack - Vulnerable Code Snippet
*/
?>

<!DOCTYPE html>
<html>
<title><?= $title ?></title>
<body>
<h1><?= $title ?></h1>

<center>
<form method="GET">
  <label for="email">Subscribe to our newsletter</label><br>
  <input type="text" name="email" value=""><br>
  <input type="submit" value="Subscribe">
</form>

<span id="out"></span>
</center>

<script>
  out = document.getElementById('out');

  //Filter email characters:
  email = '<?php echo htmlspecialchars($_GET['email']);?>';

  if ( email.split("@").length == 2  ) {
    console.log(email)
    out.innerHTML = 'Welcome: <b>'+email+'</b>';
  }

</script>

<div>
<?= $design ?>
</div>
</body>
</html>
