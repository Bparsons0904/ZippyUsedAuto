<!-- Control file for admin access -->
<?php
    // Add database and table functions
    require('../../model/db.php');
    require('../../model/vehicle_db.php');
    require('../../model/type_db.php');
    require('../../model/class_db.php');
    require('../../model/make_db.php');
   
    // Set action based on if POST or GET
    $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action == NULL) {
            // No action provided, defaut to list-items
            $action = 'vehicle-list';
        }
    }

    // Global variables for vehicle add/filter
    $typeID; $classID; $makeID; $price; $model; $year;
    $sort; $sortDirection;
    // Global variables for filter options
    $types; $classes; $makes;

    // Set success, check if part of GET
    $success = filter_input(INPUT_GET, 'success');

    // Default action, get vehicle by filters
    if ($action == 'vehicle-list') {
        // Set global filter variables
        setInputValues();
        global $typeID, $classID, $makeID, $sort, $sortDirection;
        // Get filter tables for make, class and type
        getTables();
        // Get all vehicles based on filters
        $vehicles = get_vehicles($typeID, $classID, $makeID, $sort, $sortDirection);
        // Set main display to vehicle list
        $main = 'vehicles.php';
    // Delete selected vehicle
    } else if ($action == 'deleteVehicle') {
        // Set filter variables
        setInputValues();
        global $typeID, $classID, $makeID, $sort, $sortDirection; 
        // Set vehicleID from POST value
        $vehicleID = filter_input(INPUT_POST, 'deleteValue', 
                FILTER_VALIDATE_INT);
        // Check if variables properly set
        if ($vehicleID == NULL || $vehicleID == FALSE) {
            // Add error message and display
            $error = "Missing or incorrect vehicle ID";
            $main = './errors/error.php';
            $main = 'vehicles.php';
        } else { 
            // Delete vehicle and display success message
            deleteVehicle($vehicleID);
            // Display success message and update DOM
            $successStatement = "Vehicle was successfully removed.";
            header("Location: .?typeID=$typeID&classID=$classID&makeID=$makeID&sort=$sort&sortDirection=$sortDirection&success=$successStatement");
        }
    //  Load add vehicle page
    } else if ($action == 'addVehicle') {
        // Get filter tables for make, class and type
        getTables();
        global $types, $classes, $makes;
        // Display addVehicle page
        $main = 'addVehicle.php';
    // Open edit type page 
    } else if ($action == 'editTypes') {
        // Set available vehicle types
        $types = get_types();
        // Display edit types page
        $main = 'editTypes.php';
    // Open edit classes page 
    } else if ($action == 'editClasses') {
        // Set available vehicle clasess
        $classes = get_classes();
        // Display editClasses page
        $main = 'editClasses.php';
    // Open edit makes page
    } else if ($action == 'editMakes') {
        // Set available vehicle makes
        $makes = getMakes();
        // Display editMakes page
        $main = 'editMakes.php';
    // Add vehicle list to database
    } else if ($action == 'addVehicleSubmit') {
        // Set global variables for vehivle information
        setInputValues();
        global $typeID, $classID, $makeID, $price, $model, $year;
        // Add vehicle to database
        addVehicle($year, $makeID, $model, $typeID, $classID, $price);
        // Display success message and update DOM
        $successStatement = $year . " " . $model ." successfully added.";
        header("Location: .?action=addVehicle&success=$successStatement");
    // Add make to make table
    } else if ($action == 'addMake') {
        // Set and validate make name
        $makeName = filter_input(INPUT_POST, 'makeName');
        if ($makeName == NULL) {
            // Display error message
            $error = "Invalid make name. Check name and try again.";
            $main = './errors/error.php';
        } else {
            // Add make to make table
            addMake($makeName);
            // Display success message and update DOM
            $successStatement = $makeName . " successfully added.";
            header("Location: .?action=editMakes&success=$successStatement");  
        }
    // Delete make from make table
    } else if ($action == 'deleteMake') {
        // Set and validate make ID
        $makeID = filter_input(INPUT_POST, 'deleteValue');
        if ($makeID == NULL) {
            // Display error message
            $error = "Invalid make ID. Check selection and try again.";
            $main = './errors/error.php';
        } else {
            // Add category to category table
            deleteMake($makeID);
            // Display success message and update DOM
            $successStatement = "Make successfully deleted.";
            header("Location: .?action=editMakes&success=$successStatement");  
        }
    // Add class to class table
    } else if ($action == 'addClass') {
        // Set and validate class name
        $className = filter_input(INPUT_POST, 'className');
        if ($className == NULL) {
            // Display error message
            $error = "Invalid class name. Check name and try again.";
            $main = './errors/error.php';
        } else {
            // Add class to class table
            addClass($className);
            // Display success message and update DOM
            $successStatement = $className . " successfully added.";
            header("Location: .?action=editClasses&success=$successStatement");  
        }
    // Delete class from class table
    } else if ($action == 'deleteClass') {
        // Set and validate class ID
        $classID = filter_input(INPUT_POST, 'deleteValue');
        if ($classID == NULL) {
            // Display error message
            $error = "Invalid Class name. Check name and try again.";
            $main = './errors/error.php';
        } else {
            // Add class to class table
            deleteClass($classID);
            // Display success message and update DOM
            $successStatement = "Class successfully deleted.";
            header("Location: .?action=editClasses&success=$successStatement");  
        }
    // Add type to type table
    } else if ($action == 'addType') {
        // Set and validate type ID
        $typeName = filter_input(INPUT_POST, 'typeName');
        if ($typeName == NULL) {
            // Display error message
            $error = "Invalid type name. Check name and try again.";
            $main = './errors/error.php';
        } else {
            // Add type to type table
            addType($typeName);
            // Display success message and update DOM
            $successStatement = $typeName . " successfully added.";
            header("Location: .?action=editTypes&success=$successStatement");  
        }
    // Delete type from type table
    } else if ($action == 'deleteType') {
        // Set and validate type ID
        $typeID = filter_input(INPUT_POST, 'deleteValue');
        if ($typeID == NULL) {
            // Display error message
            $error = "Invalid category name. Check name and try again.";
            $main = './errors/error.php';
        } else {
            // Add type to type table
            deleteType($typeID);
            // Display success message and update DOM
            $successStatement = "Type successfully deleted.";
            header("Location: .?action=editTypes&success=$successStatement");  
        }
    }

    // Set all possible GET/POST values
    function setInputValues()
    {
        // Set input type based on GET/POST
        $inputType = ($_SERVER['REQUEST_METHOD'] === 'POST') ? INPUT_POST : INPUT_GET;
        // Init global variables
        global $typeID, $classID, $makeID, $price, $model, $year;
        global $sort, $sortDirection;
        // Set each variable, escape special characters
        $typeID = filter_input($inputType, 'typeID', FILTER_VALIDATE_INT);
        $classID = filter_input($inputType, 'classID', FILTER_VALIDATE_INT);
        $makeID = filter_input($inputType, 'makeID', FILTER_VALIDATE_INT);
        $sort = filter_input($inputType, 'sort', FILTER_VALIDATE_INT);
        $sortDirection = filter_input($inputType, 'sortDirection', FILTER_VALIDATE_INT);
        $price = filter_input($inputType, 'price', FILTER_VALIDATE_INT);
        $year = filter_input($inputType, 'year', FILTER_VALIDATE_INT);
        $model = htmlspecialchars(filter_input($inputType, 'model'));
    }

    // Set all filter tables
    function getTables()
    {
        // Init global variables
        global $types, $classes, $makes;
        // Set each variable to array
        $types = get_types();
        $classes = get_classes();
        $makes = getMakes();
    }

    // Display core of html head and nav
    include('./header.php');
    // Display success message if active
    if ($success) {
        include('./success.php'); 
    } 
    // Injection point for active page
    include($main);
    // Display Footer
    include('../footer.php');
?>
