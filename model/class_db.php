<?php

    function get_classes() {
        // Open Database
        global $db;
        // Check if category id greater than 1, not null
        $query = 'SELECT *
                FROM class
                ORDER BY classID';

        $statement = $db->prepare($query);
        $statement->execute();
        $classes = $statement->fetchAll();
        $statement->closeCursor();
        // Return queried to do vehicles
        return $classes;
    }

    function deleteClass($classID) {
        // Open Database
        global $db;
        // Check if category id greater than 1, not null
        $query = 'DELETE FROM class
                WHERE classID = :classID';

        $statement = $db->prepare($query);
        $statement->bindValue(':classID', $classID);
        $statement->execute();
        $statement->closeCursor();
    }

    function addClass($className) {
        // Open Database
        global $db;
        // Check if category id greater than 1, not null
        $query = 'INSERT INTO class (className)
                VALUES (:className)';

        $statement = $db->prepare($query);
        $statement->bindValue(':className', $className);
        $statement->execute();
        $statement->closeCursor();
    }
?>