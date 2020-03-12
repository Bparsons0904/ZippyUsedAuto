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

    $typeID; $classID; $makeID; $price; $model; $year;
    $sort; $sortDirection;
    $types; $classes; $makes;

    // Set success, check if part of GET
    $success = filter_input(INPUT_GET, 'success');

    

    // Default action, get categories by id or all
    if ($action == 'vehicle-list') {
        setInputValues();
        global $typeID, $classID, $makeID, $sort, $sortDirection;
        // Get category ID from GET with validation
        // echo $typeID . ", " . $classID . ", " . $makeID;
        // Get all categories
        getTables();
        // Get all items based on category, defualt to all
        // $vehicles = get_vehicles(1, 1);

        $vehicles = get_vehicles($typeID, $classID, $makeID, $sort, $sortDirection);
        // Set main display to toDoList
        $main = 'vehicles.php';
    } else if ($action == 'deleteVehicle') {
        // Set variables from POST
        setInputValues();
        global $typeID, $classID, $makeID, $sort, $sortDirection; 
        $vehicleID = filter_input(INPUT_POST, 'deleteValue', 
                FILTER_VALIDATE_INT);
        // Check if variables properly set
        if ($vehicleID == NULL || $vehicleID == FALSE) {
            // Add error message and display
            // $error = "Missing or incorrect vehicle ID";
            // $main = './errors/error.php';
            $main = 'vehicles.php';
        } else { 
            // Delete item and display success message
            deleteVehicle($vehicleID);
            $successStatement = "Vehicle was successfully removed from the list.";
            header("Location: .?typeID=$typeID&classID=$classID&makeID=$makeID&sort=$sort&sortDirection=$sortDirection&success=$successStatement");
        }
    // Add to do item action
    } else if ($action == 'addVehicle') {
        global $types, $classes, $makes;
        
        setInputValues();
        global $typeID, $classID, $makeID, $sort, $sortDirection;
        // Get category ID from GET with validation
        // echo $typeID . ", " . $classID . ", " . $makeID;
        // Get all categories
        getTables();
        // Get all items based on category, defualt to all
        // $vehicles = get_vehicles(1, 1);

        $vehicles = get_vehicles($typeID, $classID, $makeID, $sort, $sortDirection);
        // Display addVehicle
        $main = 'addVehicle.php';
    // Add item to the todo table action  
    
    } else if ($action == 'editTypes') {
        $types = get_types();
        // Display addVehicle
        $main = 'editTypes.php';
    // Add item to the todo table action  
    
    } else if ($action == 'editClasses') {
        $classes = get_classes();
        // Display editClasses
        $main = 'editClasses.php';
    // Add item to the todo table action  
    
    } else if ($action == 'editMakes') {
        $makes = getMakes();
        // Display editMakes
        $main = 'editMakes.php';
    // Add item to the todo table action  
    
    } else if ($action == 'addVehicleSubmit') {
        // Set variables and validate
        setInputValues();
        global $typeID, $classID, $makeID, $price, $model, $year;
        // Verify all variables set properly
            // Add item and display success message

        addVehicle($year, $makeID, $model, $typeID, $classID, $price);
 
        $successStatement = $year . " " . $model ." was added to the To Do List Successfully.";
        
        header("Location: .?action=addVehicle&success=$successStatement");
    } else if ($action == 'addMake') {
        $makeName = filter_input(INPUT_POST, 'makeName');
        if ($makeName == NULL) {
            // Display error message
            $error = "Invalid category name. Check name and try again.";
            $main = './errors/error.php';
        } else {
            // Add category to category table
            addMake($makeName);
            // Display success message
            $successStatement = $makeName . " was added as a Category.";
            // $main = 'editMakes.php';
            header("Location: .?action=editMakes&success=$successStatement");  
        }
    } else if ($action == 'deleteMake') {
        $makeID = filter_input(INPUT_POST, 'deleteValue');
        if ($makeID == NULL) {
            // Display error message
            $error = "Invalid category name. Check name and try again.";
            $main = './errors/error.php';
        } else {
            // Add category to category table
            deleteMake($makeID);
            // Display success message
            $successStatement = " was added as a Category.";

            header("Location: .?action=editMakes&success=$successStatement");  
        }
    } else if ($action == 'addClass') {
        $className = filter_input(INPUT_POST, 'className');
        if ($className == NULL) {
            // Display error message
            $error = "Invalid category name. Check name and try again.";
            $main = './errors/error.php';
        } else {
            // Add category to category table
            addClass($className);
            // Display success message
            $successStatement = $className . " was added as a Category.";
            // $main = 'editMakes.php';
            header("Location: .?action=editClasses&success=$successStatement");  
        }
    } else if ($action == 'deleteClass') {
        $classID = filter_input(INPUT_POST, 'deleteValue');
        if ($classID == NULL) {
            // Display error message
            $error = "Invalid category name. Check name and try again.";
            $main = './errors/error.php';
        } else {
            // Add category to category table
            deleteClass($classID);
            // Display success message
            $successStatement = " was added as a Category.";

            header("Location: .?action=editClasses&success=$successStatement");  
        }
    } else if ($action == 'addType') {
        $typeName = filter_input(INPUT_POST, 'typeName');
        if ($typeName == NULL) {
            // Display error message
            $error = "Invalid category name. Check name and try again.";
            $main = './errors/error.php';
        } else {
            // Add category to category table
            addType($typeName);
            // Display success message
            $successStatement = $typeName . " was added as a Category.";
            // $main = 'editMakes.php';
            header("Location: .?action=editTypes&success=$successStatement");  
        }
    } else if ($action == 'deleteType') {
        $typeID = filter_input(INPUT_POST, 'deleteValue');
        if ($typeID == NULL) {
            // Display error message
            $error = "Invalid category name. Check name and try again.";
            $main = './errors/error.php';
        } else {
            // Add category to category table
            deleteType($typeID);
            // Display success message
            $successStatement = " was added as a Category.";

            header("Location: .?action=editTypes&success=$successStatement");  
        }
    }
    // // Display category list action
    // } else if ($action == 'list_categories') {
    //     // Get all categories
    //     $categories = get_categories();
    //     // Display categorylist page
    //     $main = 'categoryList.php';
    // // Add category action
    // } else if ($action == 'add_category') {
    //     // Set name variable from POST
    //     $name = filter_input(INPUT_POST, 'name');
    //     // Validate inputs
    //     if ($name == NULL) {
    //         // Display error message
    //         $error = "Invalid category name. Check name and try again.";
    //         $main = './errors/error.php';
    //     } else {
    //         // Add category to category table
    //         add_category($name);
    //         // Display success message
    //         $successStatement = $name . " was added as a Category.";
    //         header("Location: .?action=list_categories&success=$successStatement");  
    //     }
    // // Delete category action
    // } else if ($action == 'delete_category') {
    //     // Set variable from POST
    //     $category_id = filter_input(INPUT_POST, 'category_id', 
    //             FILTER_VALIDATE_INT);
    //     // Delete category
    //     delete_category($category_id);
    //     // Display success message
    //     $successStatement = "Category was successfully removed.";
    //     header("Location: .?action=list_categories&success=$successStatement");  
    // }
    function setInputValues()
    {
        $inputType = ($_SERVER['REQUEST_METHOD'] === 'POST') ? INPUT_POST : INPUT_GET;
        global $typeID, $classID, $makeID, $price, $model, $year;
        global $sort, $sortDirection; 
        $typeID = filter_input($inputType, 'typeID', FILTER_VALIDATE_INT);
        $classID = filter_input($inputType, 'classID', FILTER_VALIDATE_INT);
        $makeID = filter_input($inputType, 'makeID', FILTER_VALIDATE_INT);
        $sort = filter_input($inputType, 'sort', FILTER_VALIDATE_INT);
        $sortDirection = filter_input($inputType, 'sortDirection', FILTER_VALIDATE_INT);
        $price = filter_input($inputType, 'price', FILTER_VALIDATE_INT);
        $year = filter_input($inputType, 'year', FILTER_VALIDATE_INT);
        $model = htmlspecialchars(filter_input($inputType, 'model'));
        
    }

    function getTables()
    {
        global $types, $classes, $makes;
        $types = get_types();
        $classes = get_classes();
        $makes = getMakes();
    }
?>

<?php 
    // Display core of html head and nav
    include('./header.php');
    // Display success message if active
    // if ($success) {
    //     include('view/pages/success.php'); 
    // } 
    // Injection point for active page
    include($main);
    // Display Footer
    include('../footer.php'); 
?>