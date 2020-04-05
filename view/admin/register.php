<?php
    // Check if valid admin is logged in
    require_once('../../util/valid_admin.php');

    $error_username = "";
    $error_password = "";
    $error_confirm_password = "";

    if (!empty($_POST)) {
        require('../../model/admin_db.php');
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        $confirm_password = filter_input(INPUT_POST, 'confirm_password');
        if (usernameValidate($username) && passwordValidate($password, $confirm_password)) {
            add_admin($username, $password);
            global $usernameAdded;
            header("Location: ./index.php");
        }
    }

    function usernameValidate($username) {
        if (!empty($username) && (strlen($username) >= 6) && !is_username_active($username)) {
            return true;
        } else {
            global $error_username;
            if (empty($username)) {
                $error_username = "Username must be included.";
            } else if (strlen($username) < 6) {
                $error_username = "Username must be atleast 6 characters long.";
            } else {
                $error_username = "Username already exist.";
            }
        }
    }

    function passwordValidate($password, $confirm_password) {
        global $error_password, $error_confirm_password;
        if (empty($password)) {
            $error_password = "Password must be included.";
            return false;
        } else if (!passwordRegex($password)) {
            $error_password = "Password must contain at least 8 characters including one number, one uppercase letter & one lowercase letter";
            return false;
        } else if ($password !== $confirm_password) {
            $error_password = "Passwords do not match.";
            $error_confirm_password = $error_password;
            return false;
        }
        return true;
    }

    function passwordRegex($password) {
        $number    = preg_match('@[0-9]@', $password);
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $length = strlen($password) >= 8;
        echo $length;
        return $uppercase && $lowercase && $number && strlen($password) >= 8;
    }

    // Display core of html head and nav
    include('./header.php');
?>

<section class="container" id="register">
    <div class="grid-form">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="" class="">
        <div>
            <!-- <input type="hidden" name="action" id="action" value="addVehicleSubmit"> -->
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