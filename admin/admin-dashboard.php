<?php
session_start();
include("../connection.php");
include("../functions.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="navbar">
        <div class="row">
            <span class="heading"><a href="admin-dashboard.php">Food Ordering System</a></span>
            <div>
                <a href="logout.php">Log Out</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <span class="heading">Admin Dashboard</span>
            <a href="add-category.php" class="button green">Add Food Category</a>
        </div>
        <hr>
        <div class="row">
            <?php selectAllCategories($con); ?>
        </div>
    </div>
</body>

</html>