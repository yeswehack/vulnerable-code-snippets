<?php 
include_once('../../design/design.php');
include('./../../db/db.php');

/*
* YesWeHack - Vulnerable Code Snippets
*/

Design(__FILE__, "15-VSnippet");

function resetHash($con, $email, $reset) {
    /** Return a password reset link */
    if ($reset) {
        $hs = NULL;
    } else {
        $hs = md5(random_int(1000, 9999));
    }

    //SQL prepare statement, craft a new `resethash`:
    $q = $con->prepare("UPDATE `users` SET resethash=? WHERE email=?");
    $q->bind_param("ss", $hs, $email);
    $q->execute();
    
    return $hs;
}

function ChangePasswd($con, $passwd, $email, $hs) {
    /** Set new password for user */
    if ( strlen($passwd) < 8 ) {
        return false;
    } 
    //SQL prepare statement, set new password & add password reset hash:
    $q = $con->prepare("UPDATE users SET password=? WHERE resethash IS NOT NULL AND (email=? AND resethash=?)");
    $q->bind_param("sss", $passwd, $email, $hs);
    $q->execute();

    return $q->affected_rows;
}

//Standard user input:
$hash = $_GET['hash'];
$email = $_GET['email'];

if ( filter_var($email, FILTER_VALIDATE_EMAIL) && isset($_GET['new'])) {
    resetHash($mysqlDB, $email, false);
    echo "<br>The user with this email has received a new password reset hash!<br>";
    //Code... Sent `$hash` to the users mail (reset link)
}

//Change password:
if ( isset($_POST['passwd']) && ChangePasswd($mysqlDB,$_POST['passwd'],$email,$hash) ) {
    //Reset hash to NULL (true): 
    resetHash($mysqlDB, $email, true);
    echo "<br>Password changed!<br>";
}

$mysqlDB->close();
?>
