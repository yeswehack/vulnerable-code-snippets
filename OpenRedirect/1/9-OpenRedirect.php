<?php

/*
* YesWeHack - Vulnerable code snippets
*/

if ( isset($_GET['logout']) ) {
    echo "<b>Logging out...</b>";
    
    if ( !isset($_GET['redirect_to']) ) {
        //Redirect to the login domain:
        $url = "/logout.html";
    
    } else if ( preg_match("/^https:\/\/www.yeswehack.com\/.*$/",$_GET['redirect_to']) ) {
        $url = $_GET['redirect_to'];
  
    } else {
        $url = "https://www.yeswehack.com/login.php";
    }

    header("Location: ".$url, TRUE, 301);
    die;
}

?>
