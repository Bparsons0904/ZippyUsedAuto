<?php
  // Check if session has been started, if not start session
  session_status() === PHP_SESSION_ACTIVE ? '' : session_start();
	if (isset($_SESSION['firstname'])) {
    // Set variable to cookie name
    $firstname = $_SESSION['firstname'];
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Zippy Used Auto</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./view/styles/css/style.min.css" />
    <script
      src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
      integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://kit.fontawesome.com/1691b24dfc.js"
      crossorigin="anonymous"
    ></script>
    <script src="./js/script.js"></script>
  </head>

 <body>
    <nav>
      <div class="row">
        <a href="index.php" class="my-auto col-8 text-center">
          <h1>Zippy Used Auto</h1>
        </a>
        <div class="ml-auto my-auto col-4">
          <!-- Check if cookie for name is set
          Welcome message if set, registration link otherwise -->
          <?php
	          if(isset($_SESSION['firstname'])){ ?>
              <h4>Welcome <?php echo $firstname ?>!<a id="header-logout" href="logout.php">(Logout)</a></h4>
            <?php } else { ?>
            <a href="register.php"><h4>Register</h4></a>
            <?php } ?>
        </div>
      </div>
    </nav>
    <main class="container">
  </body>
</html>

