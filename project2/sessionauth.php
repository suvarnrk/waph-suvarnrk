<?php
session_set_cookie_params(15*60, "/", "waph-team26.minifacebook.com", TRUE, TRUE);
session_start();

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== TRUE) {
    session_destroy();
    echo "<script>alert('Please Login to Continue');</script>";
    header("Refresh:0; url=loginform.php");
    die();
}


if ($_SESSION["browser"] !== $_SERVER["HTTP_USER_AGENT"]) {
    session_destroy();
    echo "<script>alert('A Session hijacking attack is detected, Be cautious!');</script>";
    header("Refresh:0; url=loginform.php");
    die();
}
?>