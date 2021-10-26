<?php

$username = filter_input(INPUT_POST, 'user_name');
$password = filter_input(INPUT_POST, 'password');

if (!empty($username) || !empty($password)){

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "food_ordering_db";

    // creating a connection
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if (mysqli_connect_error()){
        die('Connect Error('. mysqli_connect_errno() .')'
        . mysqli_connect_error());
    }
    else{
        $sql = "INSERT INTO customers (user_name, password)
        values ('$username', '$password')";

        if ($conn->query($sql)){
            echo "New record is inserted sucessfully";
        }
        else{
            echo "Error:". $sql ."<br>". $conn->error;
        }
        $conn->close();
    }

}else{
    echo "Username & Password should not be empty";
    die();
}
?>