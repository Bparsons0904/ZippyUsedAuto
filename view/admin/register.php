<?php
    // Check if valid admin is logged in
    require_once('../../util/valid_admin.php');

    // Set error variables to empty
    $error_username = "";
    $error_password = "";
    $error_confirm_password = "";

    // Check is POST request
    if (!empty($_POST)) {
        // Add DB connection
        require('../../model/admin_db.php');
        // Set variables to POST values
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        $confirm_password = filter_input(INPUT_POST, 'confirm_password');
        // Check validations, if all pass add to DB
        if (usernameValidate($username) && passwordValidate($password, $confirm_password)) {
            // Add user to DB
            add_admin($username, $password);
            // Redirect to main page
            header("Location: ./index.php");
        }
    }

    // Function to validate username
    function usernameValidate($username) {
        // Check if not emmpty, length over 6 characters and username not in use
        if (!empty($username) && (strlen($username) >= 6) && !is_username_active($username)) {
            // Validation passes, return true
            return true;
        } else {
            // Set local variable to global
            global $error_username;
            // Set username error message based on failure
            // No user name
            if (empty($username)) {
                $error_username = "Username must be included.";
            // Length less than 6
            } else if (strlen($username) < 6) {
                $error_username = "Username must be atleast 6 characters long.";
            // Username already exists
            } else {
                $error_username = "Username already exist.";
            }
        }
    }

    // Validate password requirments
    function passwordValidate($password, $confirm_password) {
        // Set local variable to global
        global $error_password, $error_confirm_password;
        // If password empty, display error message and return false
        if (empty($password)) {
            $error_password = "Password must be included.";
            return false;
        // If  password doesnt match complexity requirments, add errormessage
        } else if (!passwordRegex($password)) {
            $error_password = "Password must contain at least 8 characters including one number, one uppercase letter & one lowercase letter";
            return false;
        // If password doesnt match DB, add error and return false
        } else if ($password !== $confirm_password) {
            $error_password = "Passwords do not match.";
            $error_confirm_password = $error_password;
            return false;
        }
        // All test passed, return true
        return true;
    }

    // Validate password meets strength requirements
    function passwordRegex($password) {
        $number    = preg_match('@[0-9]@', $password);
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $length = strlen($password) >= 8;
        return $uppercase && $lowercase && $number && $length;
    }

    // Display core of html head and nav
    include('./header.php');
?>

<!-- Main section of page -->
<section class="container" id="register">
    <h1 class="text-center header">Enter New Administrators</h1>
    <div class="grid-form">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="" class="">
            <div>
                <div class="grid-form-group">
                    <label for="username" class="">Username</label>
                    <input type="text" name="username" id="username" class="" />
                    <p><?php echo $error_username ?></p>
                </div>
                <div class="grid-form-group">
                    <label for="password" class="">Password</label>
                    <input type="password" name="password" id="password" class=""/>
                    <p><?php echo $error_password ?></p>
                </div>
                <div class="grid-form-group">
                    <label for="confirm_password" class="">Verify Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class=""/>
                    <p><?php echo $error_confirm_password ?></p>
                </div>
                <div class="submit-button">
                    <button type="submit" class="btn btn-color">Add Admin</button>
                </div>          
        </form>
    </div> 
</section>

<?php 
    // Display Footer
    include('../footer.php');
?>