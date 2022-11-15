<?php

/*
* YesWeHack - Vulnerable code snippets
*/

//include("/user/sessions")
session_start();
$_SESSION["session"] = "123456";//<== Quick way to just demonstrait that a "session is in place".

//Compare cookie session with logged in user stored session:
function UserCheck($session) {return true;}
function EditUser($edit, $value) {echo "Email changed"; return true;}

if ( $_COOKIE["session"] ) {
    
    if ( ($_SESSION["session"] == $_COOKIE["session"]) && UserCheck($_COOKIE["session"]) ) {

        if ( preg_match('/^[A-Za-z0-9_@\-\.]+$/', $_POST["email"]) && strlen($_POST["email"]) <= 64 ) {
            $email = $_POST["email"];
            
            if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
                echo "<b>Invalid email address</b><br>";
                die();
            }
        }
        //Change email for user:
        EditUser("email", $email);
    }
    else {
        echo "<b>Unauthorized user, no changes have been made.</b><br>";
        header("HTTP/1.1 401 Unauthorized");
        die();
    }
} 
else {
    //header("Location: /login");
    die();
}

?>
