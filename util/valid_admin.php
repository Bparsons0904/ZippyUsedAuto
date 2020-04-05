<?php 
    // Start session if not already started
    session_status() === PHP_SESSION_ACTIVE ? '' : session_start();
    isset($_SESSION['is_valid_admin']) ? "" : header("Location: ./login.php");
?>