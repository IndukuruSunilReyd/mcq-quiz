<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//session_destroy();
unset($_SESSION['id'],$_SESSION['user_name']);
header('location:login.php');

?>