<?php
 
    
    session_start();
    unset($_COOKIE['username']);
    
    session_destroy();
    
    header("Location: login.php");
    exit;

?>