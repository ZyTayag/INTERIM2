<?php
session_start();
include("connection.php");
include("functions.php");

//$user_data = check_login($con);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="navbar">
        <div class="row">
            <span class="heading">Food Ordering System</span>
            <div>
                <a href="customer/cart.php" class="button white">My Cart</a>
                <a href="logout.php">Log Out</a>
            </div>
        </div>
    </div>

    <div class="container">
        <span class="heading">Food Products</span>
        <hr>
        <div class="row">
            <form action="" method="post">
                <label for="columns">Filter by category:</label>
                <select name="columns" id="columns">
                    <!-- generate drop down options from category table using php -->
                </select>
                <input type="submit" value="Go">
            </form>
        </div>

        <!-- placeholder only -->
        <table>
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Category</th>
                    <th>Price (Php)</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Chicken</td>
                    <td>Breakfast</td>
                    <td>50</td>
                    <td><a href="customer/setOrder.php" class="button blue">Add to Cart</a></td>
                </tr>
            </tbody>
        </table>
        <!-- placeholder only -->

    </div>
</body>

</html>