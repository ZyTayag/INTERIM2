<?php
function check_login($con)
{
    if (isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];
        $query = "select * from users where user_id = '$id' limit 1";
        $result = mysqli_query($con, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    header("Location: login.php");
    die; // code will not continue
}

function selectAllCategories($con)
{
    $query = "SELECT * FROM food_categories";
    $result = mysqli_query($con, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Category Name</th>";
            echo "<th>Action</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($row = mysqli_fetch_array($result)) { //generate rows
                echo "<tr>";
                echo "<td>" . $row['category_name'] . "</td>";
                echo "<td>";
                echo '<a href="food-items.php?id=' . $row['id'] . '" class="button blue">See All Items</a>';
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
}

function categoriesDropdown($con)
{
    $query = "SELECT * FROM food_categories";
    $result = mysqli_query($con, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) { //generate options

            }
        } else {
            echo 'no categories available';
        }
    }
}

function selectAllFoodItems($con)
{
    $query = "SELECT * FROM food_items";
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
                echo '<a href="update.php?id=' . $row['id'] . '" class="button blue">Add to Cart</a>';
                echo "</td>";
                echo "</tr>";
            }
            echo  "</tbody>";
            echo "</table>";
        } else {
            echo '<div class="alert red"><span>There are no food items available.</span></div>';
        }
    }
}
