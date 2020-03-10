<?php
    function get_makes() {
        // Open Database
        global $db;
        // Check if category id greater than 1, not null
        $query = 'SELECT *
                FROM makes
                ORDER BY makeID';

        $statement = $db->prepare($query);
        $statement->execute();
        $makes = $statement->fetchAll();
        $statement->closeCursor();
        // print_r($makes);
        // Return queried to do vehicles
        return $makes;
    }
?>

