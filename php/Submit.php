<?php
include '../php/DataBase.php';
if (isset($_POST['submit'])) {
	$firstName = $_POST['First_Name'];
	$lastName = $_POST['Last_Name'];
	$email = $_POST['Email'];
	$password = $_POST['Password'];
	$phoneNumber = $_POST['Phone_Number'];
	if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($phoneNumber)) {
		header("location: ../pages/User_Registration.php?signup=empty");
		exit();
	} else {
		if (!preg_match("/[A-Z]{1}[a-z]{2,}/", $firstName) || !preg_match("/[A-Z]{1}[a-z]{2,}/", $lastName)) {
			header("location: ../pages/User_Registration.php?signup=char");
			exit();
		} else {
			if (!preg_match("/(([a-z A-Z]{3,})([-$&+,:;=?#|'<>.^*()%!]?[0-9 a-z A-Z]{3,})?([@]{1})([0-9 a-z]{1,})([.]{1})([a-z]{2,3})([.]{1}[a-z]{2,3})?)/",$email)) {
				header("location: ../pages/User_Registration.php?signup=invalidemail&first=$firstName&last=$lastName&phone=$phoneNumber");
				exit();
			} else {
				if (!preg_match("/(([a-zA-Z0-9]{5,}[@#$%*&]{1})([a-zA-Z0-9]{3,})?)/", $password)) {
					header("location: ../pages/User_Registration.php?signup=invalidpassword");
					exit();
				} else {
					if (!preg_match("/(([+]{1}[0-9]{2})?([0-9]{10}))/", $phoneNumber)) {
						header("location: ../pages/User_Registration.php?signup=number");
						exit();
					} else {
						$sqlQuery = "INSERT INTO user (firstname, lastname, email, password, phonenumber) VALUES ('$firstName', '$lastName', '$email', '$password', '$phoneNumber')";
						$result = mysqli_query($connection, $sqlQuery);
						header('location: ../pages/Login_Page.php');
					}
				}
			}
		}
	}
} else {
	header("location: ../pages/User_Registration.php?signup=error");
}
