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
    <title><?php echo $category_name . ' ' ?> - Food Item</title>
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
            <span class="heading"><?php echo $category_name ?></span>
            <a href="<?php echo 'add-item.php?id=' . $row['id'] . ''; ?>" class="button green">Add Food Item</a>
        </div>
        <hr>
        <div class="row">
            <?php selectAllFoodItems($con); ?>
        </div>
    </div>
</body>

</html>