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
    <title>Add Food Item</title>
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
        <span class="heading">Add Food Item in <?php echo $category_name ?></span>
        <hr>
        <form action="" method="POST">
            <label for="item-name">Item name:</label> <br>
            <input type="text" name="item-name" id="item-name"> <br><br>

            <label for="item-price">Price:</label> <br>
            <input type="text" name="item-price" id="item-price"> <br><br>

            <input type="submit" value="Submit" class="button green">
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $name = $_POST['item-name'];
            $price = $_POST['item-price'];
            $category = $id;

            if (!empty($name) && !empty($price) && is_numeric($price)) {
                $query = "INSERT INTO food_items (item_name, category_id, price) VALUES ('$name', '$category', '$price')";         
                mysqli_query($con, $query);
                header("Location: food-items.php?id=$id");
                die;
            } else {
                echo '<div class="alert red"><span>Please enter valid complete information.</span></div>';
            }
        }
        ?>
    </div>
</body>

</html>