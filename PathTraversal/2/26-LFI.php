<?php
include_once('../../design/design.php');//Design (Ignore)
Design(__FILE__, '26 LFI Vsnippet');//Design (Ignore)

/**
 * YesWeHack - Vulnerable Code Snippet
 */
?>

<!DOCTYPE html>
<html>
<body>

<!--Account Pages-->
<b>Logged in as Guest</b>
<div id="itemlist">
    <ul>
        <li><a href="?page=orders.html">Orders</a></li>    
        <li><a href="?page=edit.html">Edit</a></li>
        <li><a href="?page=profile.html">Profile</a></li>
    </ul>
</div>

<?php
$page = $_GET["page"];
if ( isset($_GET["page"]) ) {
    $page = preg_replace("/[\\\\\/:]/", "_", $page, 10);

} else {
    $page = "profile.html";
}
echo "Current page:\t" . htmlspecialchars($page);
echo file_get_contents("./account/$page");
?>
    
</body>
</html>
