<?php
    // Add database and table functions
    require('./model/db.php');
    require('./model/vehicle_db.php');
    require('./model/type_db.php');
    require('./model/class_db.php');
    require('./model/make_db.php');
   
    $typeID = filter_input(INPUT_GET, 'typeID', FILTER_VALIDATE_INT);
    $classID = filter_input(INPUT_GET, 'classID', FILTER_VALIDATE_INT);
    $makeID = filter_input(INPUT_GET, 'makeID', FILTER_VALIDATE_INT);
    $sort = filter_input(INPUT_GET, 'sort', FILTER_VALIDATE_INT);
    $sortDirection = filter_input(INPUT_GET, 'sortDirection', FILTER_VALIDATE_INT);

    $types = get_types();
    $classes = get_classes();
    $makes = getMakes();
    $vehicles = get_vehicles($typeID, $classID, $makeID, $sort, $sortDirection);

    include('view/header.php');
    include('view/vehicles.php');
    include('view/footer.php');
?>