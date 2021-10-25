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
    <title>Update Item</title>
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
            <span class="heading">Update Item</span>
        </div>
        <hr>
        <div class="row">
            <form method="POST">
                <label for="item-name">Food item name:</label> <br>
                <input name="item-name" id="item-name" type="text" value="<?php echo $row['item_name']; ?>"> <br><br>

                <label for="item-price">Price:</label><br>
                <input name="item-price" id="item-price" type="text" value="<?php echo $row['price']; ?>"><br><br>

                <input type="submit" value="Update" class="button blue">
            </form>
        </div>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $name = $_POST['item-name'];
            $price = $_POST['item-price'];

            if (!empty($name) && !empty($price) && !is_numeric($name) && is_numeric($price)) {
                $query = "UPDATE food_items SET item_name = '$name', price = $price WHERE id = $id";
                mysqli_query($con, $query);
                header("Location: food-items.php?id=$category_id");
                die;
            } else {
                echo '<div class="alert red"><span>Please enter valid complete information.</span></div>';
            }

        } ?>

        <a href="admin-dashboard.php">Go back to dashboard</a>
    </div>
</body>

</html>