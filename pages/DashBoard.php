<!DOCTYPE html>
<html>

<head>
    <title>User DashBoard</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>
    <div class="heading">
        <h2>User DashBoard</h2>
    </div>
    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Phone Number</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            include '../php/DataBase.php';
            // select all user details if page is visited or refreshed
            $sql = "SELECT * FROM user";
            //$sql = "SELECT * FROM user where id=1";
            $result = mysqli_query($connection, $sql);
            while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td class="firstName"> <?php echo $row['firstname']; ?> </td>
                    <td class="lastName"> <?php echo $row['lastname']; ?> </td>
                    <td class="email"> <?php echo $row['email']; ?> </td>
                    <td class="password"> <?php echo $row['password']; ?> </td>
                    <td class="phoneNumber"> <?php echo $row['phonenumber']; ?> </td>
                    <td class="edit_delete">
                        <a href="User_Registration.php?edit_id=<?php echo $row['id'] ?>">Edit</a>
                        <a href="../php/Delete.php?delete_id=<?php echo $row['id'] ?>">X</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>