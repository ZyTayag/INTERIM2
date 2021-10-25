<?php
session_start();
include("../connection.php");
include("../functions.php");

$id = trim($_GET["id"]);
$query = "SELECT * FROM food_categories WHERE id = $id";
$result = mysqli_query($con, $query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $category_id = $row['id'];
    } else {
        die("This category does not exist.");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Delete Category</title>
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
            $query = "SELECT * FROM food_categories WHERE id = $id";
            $query2 = "SELECT * FROM food_items WHERE category_id = $id";
            $result = mysqli_query($con, $query);
            $result2 = mysqli_query($con, $query2);

            if ($result) {
                if ($result2) {
                    $item_count = mysqli_num_rows($result2);
                }

                if (mysqli_num_rows($result) > 0) {
                    echo "<table>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>Category Name</th>";
                    echo "<th>Total Food Items</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    echo "<tr>";
                    echo "<td>" . $row['category_name'] . "</td>";
                    echo "<td>" . $item_count . "</td>";
                    echo "</tr>";
                    echo  "</tbody>";
                    echo "</table>";
                } else {
                    echo '<div class="alert red"><span>There are no food categories available.</span></div>';
                }
            }
            ?>
        </div>

        <form method="POST">
            <input type="submit" value="Delete" name="Delete" class="button red">
        </form><br>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $query3 = "SELECT * FROM food_categories WHERE id = $id";
            $result3 = mysqli_query($con, $query3);
            if ($result3 && mysqli_num_rows($result) > 0) {
                mysqli_query($con, "DELETE FROM food_categories WHERE id=$id");
                header("Location:admin-dashboard.php");
                die;
            } else {
                echo '<div class="alert red"><span>Failed to delete. Category does not exist.</span></div>';
            }
        } ?>

        <a href="admin-dashboard.php">Go back to dashboard</a>
    </div>
</body>

</html>