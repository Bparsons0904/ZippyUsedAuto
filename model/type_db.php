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

?>