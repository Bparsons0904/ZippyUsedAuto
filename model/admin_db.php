<?php
    require('../../model/db.php');
    
    function is_username_active($username) {
        // Open Database
        global $db;
        // 
        $query = 'SELECT count(*)
                FROM administrators
                WHERE username = :username';

        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->execute();
        $result = $statement->fetchColumn();
        $statement->closeCursor();
        // 
        // $result = true;
        return $result == 1 ? true : false;
    }

    function add_admin($username, $password) {
        // Open Database
        global $db;
        $hash = password_hash($password, PASSWORD_DEFAULT);
        // Check if category id greater than 1, not null
        $query = 'INSERT INTO administrators (username, password)
                VALUES (:username, :password)';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $hash);
        $statement->execute();
        $statement->closeCursor();
    }

    function is_valid_admin_login($username, $password) {
        // Open Database
        global $db;
        $hash = password_hash($password, PASSWORD_DEFAULT);
        // Check if category id greater than 1, not null
        $query = 'SELECT password 
                FROM administrators 
                WHERE username = :username';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();

        $hash = empty($row['password']) ? null : $row['password'];
        // if (!empty($row['password'])) {
        //     echo "row not empty";
        //    $hash = $row['password'];
        // } else {
        //     $hash = ' ';
        //     echo "Row empty";
        // }
        // if (password_verify($password, $hash)) {
        //     echo $row['password'];
        // }
        return password_verify($password, $hash);
    }

?>