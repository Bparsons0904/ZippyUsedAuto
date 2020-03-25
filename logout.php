<?php
    // Start cookie session
    session_start();
    // If cookie firstname is set
    if (isset($_SESSION['firstname'])) {
        // Set variable to cookie firstname
        $firstname = $_SESSION['firstname'];
        // Unset seession
        session_unset();
        // Destroy session
        session_destroy();
        // Set variables need to delete cookies
        $name = session_name();
        $expire = strtotime('-1 year');
        $params = session_get_cookie_params();
        $path = $params['path'];
        $domain = $params['domain'];
        $secure = $params['secure'];
        $httponly = $params['httponly'];
        // Delete cookies
        setcookie($name, '', $expire, $path, $domain, $secure, $httponly);
    }
    // Display header
    include("./view/header.php");
?>

<section>
    <!-- Display logout message with user firstname -->
    <h2 class="text-center" id="logout-text">Thank you for logging out<?php echo isset($firstname) ? " " . $firstname: ""?>!</h2>
    <div class="text-center return-link">
        <a href="index.php" class="mx-auto">Return to Vehicle List</a>
    </div>
</section>

<!-- Display footer -->
<?php include("./view/footer.php") ?>