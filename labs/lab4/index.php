<?php
session_set_cookie_params(15*60,"/","192.168.64.6",TRUE,TRUE);
session_start();
if (isset($_POST["username"]) and isset($_POST["password"])) {
    

if (checklogin_mysql($_POST["username"], $_POST["password"])) {
    $_SESSION['authenticated'] = TRUE;
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['browser'] = $_SERVER['HTTP_USER_AGENT'];

} else {
    session_destroy();
    echo "<script>alert('You have entered Invalid Username or password');window.location='form.php';</script>";
    die();
}
}

if (!isset($_SESSION['authenticated']) or $_SESSION['authenticated']!= TRUE) {
    session_destroy();
    echo "<script>alert('Please login to proceed')</script>";
    header("Refresh: 0; url=form.php");
    die();
}
if ($_SESSION['browser'] != $_SERVER['HTTP_USER_AGENT']) {
    session_destroy();
    echo "<script>alert('session hijacking attack is detected')</script>";
    header("Refresh: 0; url=form.php");
    die();
}

function checklogin_mysql($username, $password) {
    $mysqli = new mysqli('localhost', 'suvarnrk', 'ubuntu', 'waph');
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $sql = "SELECT * FROM users WHERE username= ? AND password = MD5(?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ss",$username,$password);
    $stmt->execute();
    $result=$stmt->get_result();
    if ($result->num_rows >= 1) {
        return TRUE;
    } else {
        return FALSE;
    }
}

?>


    <h2> Welcome <?php echo htmlentities($_SESSION['username']); ?> !</h2>
    <a href="logout.php">Logout</a>

