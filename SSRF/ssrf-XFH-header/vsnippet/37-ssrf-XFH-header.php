<?php
//Ignore the design setup below:
include_once('./ignore/design/design.php');
$title = 'Vsnippet #37 - Server-side request forgery (SSRF) X-Forwarded-Host header spoofing';
$design = Design(__FILE__, );

/*
* YesWeHack - Vulnerable Code Snippet
*/
?>

<html>
<title><?= $title ?></title>
<body>
<h1><?= $title ?></h1>

<?php
//Retrieve the XFH header from Apache and check its status
if (isset($_SERVER['HTTP_X_FORWARDED_HOST']) ) {
    $xfh = $_SERVER['HTTP_X_FORWARDED_HOST'];

    //In case of success, only the status code is returned, nothing else, right?
    $ch = curl_init($xfh);
    curl_exec($ch);
    curl_close($ch);

    switch ($http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE)) {
        case 200:
            echo "<b style=\"color:green\">Success: ". htmlentities($http_code) ."</b>\n";
          break;
        default:
          echo "<b style=\"color:red\">Error, the requested host gave an invalid answer.</b>\n";
      }
}
?>

<div>
<?= $design ?>
</div>
<body>
</html>
