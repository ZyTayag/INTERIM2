<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="navbar">
        <div class="row">
            <span class="heading">Food Ordering System</span>
            <a href="../admin/admin-register.php">Admin Register</a>
        </div>
    </div>

    <div class="container">
        <span class="heading">Customer Registration</span>
        <hr>

        <label for="user_name">User Name:</label> <br>
        <input id="user_name" type="text" name="user_name"><br><br>

        <label for="password">Password:</label> <br>
        <input id="password" type="password" name="password"><br><br>

        <input id="button" type="submit" value="Register" class="button green"><br><br>

        <a href="login.php">Click to Log In</a>
    </div>
</body>

</html>