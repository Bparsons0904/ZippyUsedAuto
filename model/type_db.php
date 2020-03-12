<?php

    function get_types() {
        // Open Database
        global $db;
        // Check if category id greater than 1, not null
        $query = 'SELECT *
                FROM type
                ORDER BY typeID';

        $statement = $db->prepare($query);
        $statement->execute();
        $types = $statement->fetchAll();
        $statement->closeCursor();
        // Return queried to do vehicles
        return $types;
    }

    function deleteType($typeID) {
        // Open Database
        global $db;
        // Check if category id greater than 1, not null
        $query = 'DELETE FROM type
                WHERE typeID = :typeID';

        $statement = $db->prepare($query);
        $statement->bindValue(':typeID', $typeID);
        $statement->execute();
        $statement->closeCursor();
    }

    function addType($typeName) {
        // Open Database
        global $db;
        // Check if category id greater than 1, not null
        $query = 'INSERT INTO type (typeName)
                VALUES (:typeName)';

        $statement = $db->prepare($query);
        $statement->bindValue(':typeName', $typeName);
        $statement->execute();
        $statement->closeCursor();
    }
?>