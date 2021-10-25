<?php
$username = $_POST['user_name'];
$password = $_POST['password'];

if (!empty($username) || !empty($password)){
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "customers";

// create a connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

if (mysqli_connect_error()){
    die('Connect Error('. mysqli_connect_error().')'. mysqli_connect_error());
}else{
    $SELECT = "SELECT email From register Where id = ? Limit 1";
    $INSERT = "INSERT Into resister (user_name, password) values(?, ?)";

    //Prepare statement
    $stmt = $conn->prepare($SELECT);
    $stmt ->bind_param("s", $id);
    $stmt->execute();
    $stmt->bind_result($id);
    $stmt->store_result();
    $rnum = $stmt->num_rows;

    if ($rnum==0){
        $stmt->close();

        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();

        echo "New record inserted sucessfully";
    }else{
        echo "Someone already resister this username";
    }
    $stmt->close();
    $conn->close();
}
}else{
    echo "All field are required";
    die();
}
?>