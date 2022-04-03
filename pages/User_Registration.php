<?php
$update = false;
$firstName = "";
$lastName = "";
$email = "";
$password = "";
$phoneNumber = "";
$id = 0;
if (isset($_GET['edit_id'])) {
	$id = $_GET['edit_id'];
	$update = true;
	include '../php/DataBase.php';
	$result = mysqli_query($connection, "SELECT * FROM user WHERE id='$id'");
	if ($result) {
		$row = mysqli_fetch_assoc($result);
		$firstName = $row['firstname'];
		$lastName = $row['lastname'];
		$email = $row['email'];
		$password = $row['password'];
		$phoneNumber = $row['phonenumber'];
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>User Registration</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>
	<div class="heading">
		<h2>User Registration SignUp</h2>
	</div>
	<form method="post" action="../php/Submit.php" class="input_form">
		<input type="hidden" value="<?php echo $id ?>" name="id">
		<div>
			<input type="text" name="First_Name" class="user_input" value="<?php echo $firstName; ?>" placeholder="Enter Your First Name" />
		</div>
		<div>
			<input type="text" name="Last_Name" class="user_input" value="<?php echo $lastName; ?>" placeholder="Enter Your Last Name" />
		</div>
		<div>
			<input type="text" name="Email" class="user_input" value="<?php echo $email; ?>" placeholder="Enter Your Email" />
		</div>
		<div>
			<input type="text" name="Password" class="user_input" value="<?php echo $password; ?>" placeholder="Enter Your Password" />
		</div>
		<div>
			<input type="text" name="Phone_Number" class="user_input" value="<?php echo $phoneNumber; ?>" placeholder="Enter Your Phone Number" />
		</div>
		<?php
		if ($update == true) :
		?>
			<button formaction="../php/Update.php" value="update" type="submit" name="update" id="add_btn" class="add_btn">Update</button>
		<?php else : ?>
			<button value="submit" type="submit" name="submit" id="add_btn" class="add_btn">Sign Up</button>
		<?php endif; ?>
	</form>

	<?php
	/*$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

	if (strpos($fullUrl, "signup=empty") == true) {
		echo "<p class='error'>You did not fill in all fields!</p>";
		exit();
	} elseif (strpos($fullUrl, "signup=char") == true) {
		echo "<p class='error'>You used invalid format!</p>";
		exit();
	} elseif (strpos($fullUrl, "signup=invalidemail") == true) {
		echo "<p class='error'>You used an invalid e-mail!</p>";
		exit();
	} elseif (strpos($fullUrl, "signup=invalidpassword") == true) {
		echo "<p class='error'>You used an invalid password!</p>";
		exit();
	} elseif (strpos($fullUrl, "signup=number") == true) {
		echo "<p class='error'>You used invalid format</p>";
		exit();
	}*/

	if (!isset($_GET['signup'])) {
		exit();
	} else {
		$signupCheck = $_GET['signup'];

		if ($signupCheck == "empty") {
			echo "<p class='error'>You have to fill in all the fields!</p>";
			exit();
		} elseif ($signupCheck == "char") {
			echo "<p class='error'>You used invalid format!</p>";
			exit();
		} elseif ($signupCheck == "invalidemail") {
			echo "<p class='error'>You used an invalid e-mail!</p>";
			exit();
		} elseif ($signupCheck == "invalidpassword") {
			echo "<p class='error'>You used an invalid password!</p>";
			exit();
		} elseif ($signupCheck == "number") {
			echo "<p class='error'>You used invalid format</p>";
			exit();
		}
	}
	?>
</body>

</html>