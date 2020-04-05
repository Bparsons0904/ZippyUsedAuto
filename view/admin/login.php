<?php

    $error_username = "";
    $error_password = "";
    if (!empty($_POST)) {
        require_once('../../model/admin_db.php');
        
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        if (empty($username) || empty($password)) {
            if (empty($username)) {
                $error_username = "Please include username";
            } else {
                $error_password = "Please include password";
            }
        } else {

            if (is_valid_admin_login($username, $password)) {
                session_status() === PHP_SESSION_ACTIVE ? '' : session_start();
                $_SESSION["is_valid_admin"] = true;
                header("Location: ./index.php");
            } else {
                $error_password = "Incorrect Password";
            }
        }
    }

    // Display core of html head and nav
    include('./header.php');
?>

<section class="container" id="login">
    <div class="grid-form">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="" class="">
            <div class="">
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
            <div class="submit-button">
                <button type="submit" class="btn btn-color">Login</button>
            </div>          
        </form>

    </div>
</section>

<?php 
    // Display Footer
    include('../footer.php');
?>
