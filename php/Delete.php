<?php
// Delete User Details related to a Particular Id
include '../php/DataBase.php';
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $sqlQuery = "DELETE FROM user WHERE id=$id";
    $result = mysqli_query($connection, $sqlQuery);
    if ($result) {
        header('location: ../pages/DashBoard.php');
    }
}
