<?php
include_once('./ignore/design/design.php');
Design(__FILE__, "Secound order SQL injection - (SoSQLi)");
include("./ignore/db/db.php");

/*
* YesWeHack - Vulnerable Code Snippet
*/

class user {
    public int $id;
    public string $username;
    public string $note;

    function __construct(int $id, string $username, $note='') {
        $this->id =  $id;
        $this->username =  $username;
        $this->note = $note;
    }

    function new_note($mysqlDB) {
        $stmt = $mysqlDB->prepare("UPDATE users SET note = ? WHERE ( username = ? and id = ? )");
        $stmt->bind_param("ssi", $this->note, $this->username, $this->id);
        $stmt->execute();
        $stmt->store_result();
    }

    function share_notes($mysqlDB) {
        $value = '';

        $stmt = $mysqlDB->prepare("SELECT note FROM users WHERE ( username = ? and id = ? )");
        $stmt->bind_param("si", $this->username, $this->id);
        $stmt->execute();
        $stmt->bind_result($value);
        $stmt->fetch();
        $stmt->close();

        //Note user controlled anyway go for a fast SQL query to get all users that share the same note:
        $userShare = $mysqlDB->query("SELECT username, note from users WHERE note = '$value'");

        while($row = $userShare->fetch_assoc()) {
            echo "<h4>[+]",$row['username'], ':', $row['note'] . "</h4>";
        }
    }
}

//Verify user and set session etc...
function user_validated() {
    //Code...
    return true;
}

if ( user_validated() ) {
    $current_user = new user(1, 'Mario');

    $user_note = '';
    if ( isset($_GET['note']) ) {
        $current_user->note = $_GET['note'];
        $current_user->new_note($mysqlDB);
    }

    if ( isset($_GET['view']) && !isset($_GET['note']) ) {
        $current_user->share_notes($mysqlDB);
    }
}

?>
