<?php
session_start();
include("../connection.php");
include("../functions.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Food Category</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="navbar">
        <div class="row">
            <span class="heading"><a href="admin-dashboard.php">Food Ordering System</a></span>
            <div>
                <a href="../logout.php">Log Out</a>
            </div>
        </div>
    </div>
    <div class="container">
        <span class="heading">Add Food Category</span>
        <hr>
        <form action="" method="POST">
            <label for="category-name">New food category name:</label> <br>
            <input type="text" name="category-name" id="category-name"> <br><br>
            <input type="submit" value="Submit" class="button green">
        </form>
        <br>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $category_name = $_POST['category-name'];
            if (!empty($category_name) && !is_numeric($category_name)) {
                $query = "INSERT INTO food_categories (category_name) VALUES ('$category_name')";
                mysqli_query($con, $query);
                header("Location: admin-dashboard.php");
                die;
            } else {
                echo '<div class="alert red"><span>Please enter valid complete information.</span></div>';
            }
        }
        ?>
        <a href="admin-dashboard.php">Go back to dashboard</a>
    </div>
</body>

</html>