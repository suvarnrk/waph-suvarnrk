
<?php
//require "sessionauth.php";
require "database.php";

 //$token = $_POST['csrf-token'];
 //if (!isset($token) || $token !== $_SESSION['csrf-token']) {
 //    echo "CSRF Attack is detected";
  // die();
//}

$username = $_POST['username'];
$newpassword = $_POST['newpassword'];
if (isset($username) && isset($newpassword)) {
    //echo "Debug> passwordchange.php got username = $username; got password = $newpassword <br>";
    if (passwordchange($username, $newpassword)) {
        echo "Password has Successfully changed";
    } else {
        echo "Password changing has failed try again";
    }
} else {
    echo "Invalid credentials please try again";
}
?>
<form action="loginform.php" method="GET">
    <button type="submit">Back to Login!</button>
</form>
