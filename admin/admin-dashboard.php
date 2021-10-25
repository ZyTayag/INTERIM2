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
                <a href="../logout.php">Log Out</a>
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
            <?php
            $query = "SELECT * FROM food_categories";
            $result = mysqli_query($con, $query);

            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    echo "<table>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>Category Name</th>";
                    echo "<th>Actions</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['category_name'] . "</td>";
                        echo "<td>";
                        echo '<a href="food-items.php?id=' . $row['id'] . '" class="button blue">See All Food Items</a>';
                        echo '<a href="delete-category.php?id=' . $row['id'] . '" class="button red">Delete</a>';
                        echo "</td>";
                        echo "</tr>";
                    }
                    echo  "</tbody>";
                    echo "</table>";
                } else {
                    echo '<div class="alert red"><span>There are no food categories available.</span></div>';
                }
            }
            ?>
        </div>
    </div>
</body>

</html>