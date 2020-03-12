<?php
    function getMakes() {
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

    function deleteMake($makeID) {
        // Open Database
        global $db;
        // Check if category id greater than 1, not null
        $query = 'DELETE FROM makes
                WHERE makeID = :makeID';

        $statement = $db->prepare($query);
        $statement->bindValue(':makeID', $makeID);
        $statement->execute();
        $statement->closeCursor();
    }

    function addMake($makeName) {
        // Open Database
        global $db;
        // Check if category id greater than 1, not null
        $query = 'INSERT INTO makes (makeName)
                VALUES (:makeName)';

        $statement = $db->prepare($query);
        $statement->bindValue(':makeName', $makeName);
        $statement->execute();
        $statement->closeCursor();
    }
?>

