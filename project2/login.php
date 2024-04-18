<?php
//session_set_cookie_params(15*60, "/", "waph-team26.mini.facebook.com", TRUE, TRUE);
session_start();
require "database.php"; 

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"]; 
    $password = $_POST["password"];

    if (checklogin_mysql($username, $password)) {
        $_SESSION["authenticated"] = TRUE;
        $_SESSION["username"] = $username; 
        $_SESSION["browser"] = $_SERVER["HTTP_USER_AGENT"];
    } else {
        session_destroy();
        echo "<script>alert('Invalid Username or password please recheck');window.location='loginform.php';</script>";
        die();
    }
}

if (!isset($_SESSION["authenticated"]) || $_SESSION["authenticated"] != TRUE) { 
    session_destroy();
    echo "<script>alert('Please Login!');</script>";
    header("Refresh:0; url=loginform.php");
    die();
}

if ($_SESSION["browser"] != $_SERVER["HTTP_USER_AGENT"]) {
    session_destroy();
    echo "<script>alert('Session hijack detected')</script>"; 
    header("Refresh:0; url=loginform.php");
    die();
}
?>
<h2> Welcome <?php echo htmlentities($_SESSION['username']); ?> !</h2>
<a href="passwordchangeform.php?username=<?php echo urlencode($_SESSION['username']); ?>">Change password</a> |
 <a href="edituser.php?username=<?php echo urlencode($_SESSION['username']); ?>">Edit profile</a> | <a href ="logout.php">logout 
</a> | <a href="viewprofile.php?username=<?php echo urlencode($_SESSION['username']); ?>">View Profile</a> 
