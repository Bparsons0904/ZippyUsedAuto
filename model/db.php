<?php

    // Set for local or production DB
    const PRODUCTION = false;

    // Check if production build, if so use Heroku DB
    if (PRODUCTION) {
        // DB variables set to required settings
        $dsn = 'mysql:host=dno6xji1n8fm828n.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=slpafkyj9hk6x3t2';
        $username = 'mw3yn3xjtchrilr8';
        $password = 't5c53slvfyas7c2l';
        // Try PDO connection
        try {
            $db = new PDO($dsn, $username, $password);
            } catch (PDOException $e) {
                // Display error message
                $error_message = $e->getMessage();
                include('./view/header.php');
                include('./errors/database_error.php');
                include('./view/footer.php');
            exit();
        } 
    // Set DB to localhost
    } else {
        // DB variables set to required settings
        $dsn = 'mysql:host=localhost;dbname=zippyusedautos';
        $username = 'root';

        // Try PDO connection
        try {
            $db = new PDO($dsn, $username);
        } catch (PDOException $e) {
            // Display error message
            $error_message = $e->getMessage();
            include('./errors/database_error.php');
            exit();
        }
    }
    
?>