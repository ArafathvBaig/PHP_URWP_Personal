<?php
include '../php/DataBase.php';
if (isset($_POST['login'])) {
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    if (empty($email) || empty($password)) {
        header("location: ../pages/Login_Page.php?login=empty");
        exit();
    } else {
        if (
            !preg_match("/(([a-z A-Z]{3,})([-$&+,:;=?#|'<>.^*()%!]?[0-9 a-z A-Z]{3,})?([@]{1})([0-9 a-z]{1,})([.]{1})([a-z]{2,3})([.]{1}[a-z]{2,3})?)/", $email) ||
            !preg_match("/(([a-zA-Z0-9]{5,}[@#$%*&]{1})([a-zA-Z0-9]{3,})?)/", $password)
        ) {
            header("location: ../pages/Login_Page.php?login=invalid");
        } else {
            $sqlQuery = "SELECT * FROM user WHERE email='$email' AND password='$password'";
            $result = mysqli_query($connection, $sqlQuery);
            $row = mysqli_fetch_array($result);
            if (!isset($row['id'])) {
                header('location: ../pages/Login_Page.php?login=wrong');
            } else {
                header('location: ../pages/DashBoard.php?login=success');
            }
        }
    }
} else {
    header('location: ../pages/Login_Page.php');
}
