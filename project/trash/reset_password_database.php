<?php
 $host = "localhost";
 $dbname = "login_db";
 $username = "root";
 $password = "";
 
 $conn = new mysqli($host, $username, $password, $dbname);
 
 if ($conn->connect_error) {
     die("Connection error: " . $mysqli->connect_error);
 }

 session_start();
 $updatedinfo = false;
  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_SESSION["username"])){
        $mysqli = require __DIR__ . "/database.php";
    
        $sql = "SELECT * FROM users 
                WHERE username = {$_SESSION["username"]}";
    
        $result = $mysqli->query($sql);
        
        $user = $result->fetch_assoc();
    }

    if($_POST['password_reset'] !== ''){
        $updated_password = $_POST['password_reset'];
    }
    else if(empty($_POST['password_reset'])){
        die("please enter a valid phone number");
    }
    $sql = "UPDATE users SET 
            password_hash = '$updated_password'
            WHERE phone = {$user['phone']}";

     if($conn->query($sql)){
        header("location: login.page.php");
        $updatedinfo = true;
     }
     else{
        echo "error -> " . $conn->error;
     }
     
     $conn->close();

}