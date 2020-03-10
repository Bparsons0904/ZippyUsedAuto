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

?>