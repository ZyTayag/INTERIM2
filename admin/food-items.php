<?php
session_start();
include("../connection.php");
include("../functions.php");

$id = trim($_GET["id"]);
$query = "SELECT * FROM food_categories WHERE id = '$id'";
$result = mysqli_query($con, $query);

if ($result) {
    $row = mysqli_fetch_array($result);
    $category_name = $row['category_name'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $category_name . ' ' ?> - Food Items</title>
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
            <span class="heading"><?php echo $category_name ?></span>
            <a href="<?php echo 'add-item.php?id=' . $row['id'] . ''; ?>" class="button green">Add Food Item</a>
        </div>
        <hr>
        <div class="row">
            <?php
            $query = "SELECT * FROM food_items WHERE category_id = $id";
            $result = mysqli_query($con, $query);

            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    echo "<table>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>Item Name</th>";
                    echo "<th>Price (Php)</th>";
                    echo "<th>Action</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    while ($row = mysqli_fetch_array($result)) { //generate rows
                        echo "<tr>";
                        echo "<td>" . $row['item_name'] . "</td>";
                        echo "<td>" . $row['price'] . "</td>";
                        echo "<td>";
                        echo '<a href="update-item.php?id=' . $row['id'] . '" class="button blue">Update Item</a>';
                        echo '<a href="delete-item.php?id=' . $row['id'] . '" class="button red">Delete</a>';
                        echo "</td>";
                        echo "</tr>";
                    }
                    echo  "</tbody>";
                    echo "</table>";
                } else {
                    echo '<div class="alert red"><span>There are no food items available.</span></div>';
                }
            }
            ?>
        </div>
    </div>
</body>

</html>