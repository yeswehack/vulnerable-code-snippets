<?php
//Ignore the design setup below:
include_once('./ignore/design/design.php');
$design = Design(__FILE__, 'Vsnippet #38 - PHP Code Injection');

/*
* YesWeHack - Vulnerable Code Snippet
*/
?>

<?php

$file = "todo.txt";
if ( isset($_GET['fileTodo']) && strlen($_GET['fileTodo']) > 0 ) {
  $file = $_GET['fileTodo'];
}

$fileTodo = fopen($file, "a");

if ( isset($_GET['add']) ) {
  $todo = '<input type="checkbox"><b>'. $_GET['add'] .'</b><br>';
  fwrite($fileTodo, $todo);
}
fclose($fileTodo);

?>

<div style="font-size:18px;">
  <?= file_get_contents($file); ?>
</div>

<div id="todo">
<form action="" method="GET">
  <label>Add a new todo to your file!</label>
  <input type="textarea" name="add">
  <input type="hidden" name="fileTodo" value="todo.txt">
</form>
</div>

<div>
<?= $design ?>
</div>
<body>
</html>
