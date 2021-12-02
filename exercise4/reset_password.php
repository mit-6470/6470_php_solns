<html>

<head>
    <title>Reset password</title>
</head>

<body>

    <?php
    $success = false;

    if (isset($_POST["username"]) && isset($_POST["phone"])) {
        require("../db.php");
        $user = mysqli_real_escape_string($db, $_POST["username"]);
        $phone = mysqli_real_escape_string($db, $_POST["phone"]);
        $query = "SELECT COUNT(*) FROM users WHERE USERNAME='$user' AND PHONE='$phone'";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_array($result);
        if ($row["COUNT(*)"] != 0) {
            $chars = str_split("abcdefghijklmnopqrstuvwxyz1234567890");
            shuffle($chars);
            $newpass = substr(implode("", $chars), 0, 8);
            $query = "UPDATE users SET PASSWORD='$newpass' WHERE USERNAME='$user'";
            mysqli_query($db, $query);
            echo "Password successfully reset. Your new password is $newpass.";
            $success = true;
        } else {
            echo "Invalid username or phone number does not match.";
        }

    ?>

    <?php
    }
    if (!$success) {
    ?>
        <h1>Reset Password</h1><br />
        Enter your username and phone number <br />
        <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
            Username: <input type="text" name="username" /><br />
            Phone: <input type="text" name="phone" /><br />
            <input type="submit" />
        </form>


    <?php } ?>

    <a href="login.php">Click here to login</a>

</body>

</html>