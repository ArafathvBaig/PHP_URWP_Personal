<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>
    <div class="heading">
        <h2>Login Page</h2>
    </div>
    <form method="post" action="../php/Login.php" class="login_form">
        <div>
            <input type="text" name="Email" class="user_input" placeholder="Enter Your Email">
        </div>
        <div>
            <input type="text" name="Password" class="user_input" placeholder="Enter Your Password">
        </div>
        <button value="submit" type="submit" name="login" id="add_btn" class="add_btn">Login</button>
        <a href="./User_Registration.php">
            <input type="button" class="add_btn" value="Sign_Up" name="signUp">
        </a>
    </form>

    <?php
    if (!isset($_GET['login'])) {
        exit();
    } else {
        $loginCheck = $_GET['login'];

        if ($loginCheck == "empty") {
            echo "<p class='error'>You have to fill in all the fields!</p>";
            exit();
        } elseif ($loginCheck == "invalid") {
            echo "<p class='error'>You used an invalid e-mail or password format!</p>";
            exit();
        } elseif ($loginCheck == "wrong") {
            echo "<p class='error'>Wrong e-mail or password!</p>";
            exit();
        } elseif ($loginCheck == "success") {
            echo "<p class='error'>LoggedIn Successfully!</p>";
            exit();
        }
    }
    ?>
</body>

</html>