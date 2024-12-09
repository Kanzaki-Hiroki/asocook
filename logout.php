<?php
    session_start();
    session_unset();
    session_destroy();
    setcookie('PHPSESSID','', time() - 3600,'/');
    $GLOBALS['login_status'] = false;
    header("Location:login.php");
?>