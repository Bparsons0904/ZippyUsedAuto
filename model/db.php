<?php
    // DB variables set to required settings
    $dsn = 'mysql:host=localhost;dbname=zippyusedautos';
    $username = 'root';

    // Try DBO connection
    try {
        $db = new PDO($dsn, $username);
    } catch (PDOException $e) {
        // Display error message
        $error_message = $e->getMessage();
        include('./view/header.php');
        include('./errors/database_error.php');
        include('./view/footer.php');
        exit();
    }
?>