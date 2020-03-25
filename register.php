<?php
	// Check if GET and firstname set
	if (isset($_GET['firstname'])) {
		// Start cookie session
		session_start();
		// Set variable to GET input
		$firstname = htmlspecialchars(filter_input(INPUT_GET, 'firstname'));
		// Set cookie to GET value
		$_SESSION["firstname"] = $firstname;
	}
	// Display header
	include("./view/header.php");
?>

<section class="container" id="register">
	<!-- If $firstname is set, display thank you message else reg form -->
	<?php if (isset($firstname)) { ?>
		<h2 class="text-center">That you for registering <?php echo $firstname ?></h2>
		<div class="text-center return-link">
			<a href="index.php" class="mx-auto">Return to Vehicle List</a>
		</div>
	<?php }  else { ?>
        <form method="GET" action="" id="registration-form">
			<h1 class="text-center">Zippy Easy Registration</h1>
			<div class="mx-auto" id="reg-input">
				<div class="row">
					<div class="" id="reg-row">
						<div id="reg-input">
							<input class="" type="text" name="firstname" placeholder="Enter First Name">
						</div>
						
						<button class="btn btn-outline-light text-center" type="submit">Register</button>
					</div>
				</div>
			</div>
		</form>
    <?php } ?>
</section>

<!-- Display footer -->
<?php include("./view/footer.php") ?>