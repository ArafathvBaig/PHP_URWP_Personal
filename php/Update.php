<?php
// update the edited user
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $firstName = $_POST['First_Name'];
    $lastName = $_POST['Last_Name'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $phoneNumber = $_POST['Phone_Number'];
    include '../php/DataBase.php';
    $sqlQuery = "UPDATE user SET firstname='$firstName', lastname='$lastName', email='$email', password='$password', phonenumber='$phoneNumber' WHERE id=$id";
    $result = mysqli_query($connection, $sqlQuery);
    if ($result) {
        header('location: ../pages/DashBoard.php');
    }
}
