
<?php

    function get_vehicles($typeID, $classID, $makeID, $sort, $sortDirection) {
        // Open Database
        global $db;
        $bindValues = [];
        $bindCount = 0;
        // Check if category id greater than 1, not null
        $query = 'SELECT vehicleID, year, makes.makeName, model, price, type.typeName, class.className
                FROM vehicles
                LEFT JOIN makes on vehicles.makeID = makes.makeID
                LEFT JOIN type on vehicles.typeID = type.typeID
                LEFT JOIN class on vehicles.classID = class.classID';
        if ($typeID >= 1) {
            $query .= ' WHERE type.typeID = :typeID';
            array_push($bindValues, [':typeID', $typeID]);
            $bindCount++;
        }
        if ($classID >= 1) {
            $query .= $bindCount > 0 ? ' AND ' : ' WHERE ';
            $query .= 'class.classID = :classID';
            array_push($bindValues, [':classID', $classID]);
            $bindCount++;
        }
        if ($makeID >= 1) {
            $query .= $bindCount > 0 ? ' AND ' : ' WHERE ';
            $query .= 'makes.makeID = :makeID';
            array_push($bindValues, [':makeID', $makeID]);
            $bindCount++;
        }
        if ($sort == 1) {
            $query .= ' ORDER BY price';
        } else {
            $query .= ' ORDER BY year';
        }
        if ($sortDirection == 1) {
            $query .= ' ASC';
        } else {
            $query .= ' DESC';
        }
        
        // echo $query;
        // if (!$typeID >= 1 && !$classID >= 1) {
        //     echo "Neither";
        //     $query = 'SELECT make, model, price, type.typeName, class.className
        //         FROM vehicles
        //         LEFT JOIN type on vehicles.typeID = type.typeID
        //         LEFT JOIN class on vehicles.classID = class.classID
        //         ORDER BY price';
        //     } else if ($typeID >= 1 && $classID >= 1){
        //     echo "both";
        //     $query = 'SELECT make, model, price, type.typeName, class.className
        //         FROM vehicles
        //         LEFT JOIN type on vehicles.typeID = type.typeID
        //         LEFT JOIN class on vehicles.classID = class.classID
        //         WHERE class.classID = :classID
        //         AND type.typeID = :typeID
        //         ORDER BY price';
        //     array_push($bindValues, [':typeID', $typeID]);
        //     array_push($bindValues, [':classID', $classID]);
        // } else if ($typeID >= 1) {
        //     echo "typeID" . $typeID;
        //     $query = 'SELECT make, model, price, type.typeName, class.className
        //         FROM vehicles
        //         LEFT JOIN type on vehicles.typeID = type.typeID
        //         LEFT JOIN class on vehicles.classID = class.classID
        //         WHERE type.typeID = :typeID
        //         ORDER BY price';
        //     array_push($bindValues, [':typeID', $typeID]);
        // } else {
        //     echo "classID";
        //     $query = 'SELECT make, model, price, type.typeName, class.className
        //         FROM vehicles
        //         LEFT JOIN type on vehicles.typeID = type.typeID
        //         LEFT JOIN class on vehicles.classID = class.classID
        //         WHERE class.classID = :classID
        //         ORDER BY price';
        //     array_push($bindValues, [':classID', $classID]);
        // } 

        $statement = $db->prepare($query);
        for ($i = 0; $i < count($bindValues); $i++) { 
            $statement->bindValue($bindValues[$i][0], $bindValues[$i][1]);
        }
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        // Return queried to do vehicles
        // print_r($vehicles);
        return $vehicles;
    }

        // Delete item from database
    function deleteVehicle($vehicleID) {
        // Open database
        echo $vehicleID;
        global $db;
        // Get item based on item ID
        $query = 'DELETE FROM vehicles
                WHERE vehicleID = :vehicleID';
        // PDO delete item from database
        $statement = $db->prepare($query);
        $statement->bindValue(':vehicleID', $vehicleID);
        $statement->execute();
        $statement->closeCursor();
    }

    // // Add to do item to database
function addVehicle($year, $makeID, $model, $typeID, $classID, $price) {
    // Open database
    global $db;
    // Set query for item to be added
    $query = 'INSERT INTO todoitems
                 (year, makeID, model, typeID, classID, price)
              VALUES
                 (:year, :makeID, :model, :typeID, :classID, :price)';
    // PDO insert item into database
    $statement = $db->prepare($query);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':makeID', $makeID);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':typeID', $typeID);
    $statement->bindValue(':classID', $classID);
    $statement->bindValue(':price', $price);
    $statement->execute();
    $statement->closeCursor();
}
?>