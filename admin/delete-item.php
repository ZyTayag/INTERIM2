<?php
session_start();
include("../connection.php");
include("../functions.php");

$id = trim($_GET["id"]);
$query = "SELECT * FROM food_items WHERE id = $id";
$result = mysqli_query($con, $query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $category_id = $row['category_id'];
    } else {
        die("This food item does not exist.");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Delete Item</title>
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
            <span class="heading">Confirm deletion</span>
        </div>
        <hr>
        <div class="row">
            <?php
            echo "<table>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Food Item Name</th>";
            echo "<th>Price</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            echo "<tr>";
            echo "<td>" . $row['item_name'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "</tr>";
            echo  "</tbody>";
            echo "</table>";
            ?>
        </div>

        <form method="POST">
            <input type="submit" value="Delete" name="Delete" class="button red">
        </form><br>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $query2 = "SELECT * FROM food_items WHERE id = $id";
            $result2 = mysqli_query($con, $query2);
            if ($result2 && mysqli_num_rows($result) > 0) {
                mysqli_query($con, "DELETE FROM food_items WHERE id=$id");
                header("Location:food-items.php?id=$category_id");
                die;
            } else {
                echo '<div class="alert red"><span>Failed to delete. Food item does not exist.</span></div>';
            }
        } ?>

        <a href="admin-dashboard.php">Go back to dashboard</a>
    </div>
</body>

</html>