<?php

//declared email and password
$email=$_POST['email'];
$password=$_POST['password'];

//database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "renteasy";

//creating connection(querying)
$conn = new mysqli($servername, $username, $password, $dbname);

//create connection
if($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}

//writing the sql statement for the database
$sql = "SELECT id, email, password FROM user";

//after you query the result
$result = $conn->query($sql);

$count=mysqli_num_rows($result);


//fetching info of the user
$container=mysqli_fetch_assoc($result);

session_start();
if($count==1){
    $id=$_SESSION("login user");
    header("property.html");
}
    else{
        header("error-login.html");
    }
?>