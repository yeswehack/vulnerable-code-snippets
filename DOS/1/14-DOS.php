<?php

/*
* YesWeHack - Vulnerable code snippets
*/

/**[WARNING]
 *  Not needed but... It's recommended to run & exploit this code inside a Virtual machine (VM) or docker.
 *  Without spoiling to much. PHP "timeout" is ~30s.
 */

//[RUN]: "php -S 127.1:5000 14-new.php"
function InviteLink($from, $to) {  

    //Variables:
    $f = intval($from);
    $t = intval($to);
    $l = "abcdefghijklmnopqrstuvwxyz";
    $invite = "";


    //Control the length:
    if ( ( ($f >= 0 && $f <= 16) && $t <= 64 ) == false) {
        return null;
    }
    //Generate an invite:
    for ($i = $f; $i != $t; $i++) { 
            $invite .= $l[rand(0, strlen($l) - 1)];
    }

    $link = ("https://".$_SERVER['SERVER_NAME']."/".$invite);

    return $link;
} 

echo "<h2>Generate a invite link\n</h2>";

if ( isset($_GET['from']) || isset($_GET['to']) ) {
    echo "Your link: ", InviteLink($_GET['from'], $_GET['to']);
}

?>
