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
                WHERE id = {$_SESSION["id"]}";
    
        $result = $mysqli->query($sql);
        
        $user = $result->fetch_assoc();
    }
    
    if($_POST['session_email_update'] !== ''){
        $updated_email = $_POST['session_email_update'];
    }else{
        $updated_email = $user['email'];
    }

    if($_POST['session_username_update'] !== ''){
        $updated_username = $_POST['session_username_update'];
    }else{
        $updated_username = $user['username'];
    }

    if($_POST['session_firstname_update'] !== ''){
        $updated_firstname = $_POST['session_firstname_update'];
    }else{
        $updated_firstname = $user['firstName'];
    }

    if($_POST['session_lastname_update'] !== ''){
        $updated_lastname = $_POST['session_lastname_update'];
    }else{
        $updated_lastname = $user['lastName'];
    }

    if($_POST['session_middlename_update'] !== ''){
        $updated_middlename = $_POST['session_middlename_update'];
    }else{
        $updated_middlename = $user['middleName'];
    }

    if($_POST['session_phone_update'] !== ''){
        $updated_phone = $_POST['session_phone_update'];
    }else{
        $updated_phone = $user['phone'];
    }

    
    if($_POST['session_password_update'] !== ''){
        $updated_password = $_POST['session_password_update'];
    }
    else if(empty($_POST['session_password_update'])){
        $updated_password = $user['password_hash'];
    }


     $sql = "UPDATE users SET 
     username = '$updated_username',
     firstName = '$updated_firstname',
     lastName = '$updated_lastname',
     middleName = '$updated_middlename',
     email = '$updated_email',
     phone = '$updated_phone',
     password_hash = '$updated_password'
     WHERE id = {$_SESSION['id']}";
     if($conn->query($sql)){
        header("location: profile.php");
        $updatedinfo = true;
     }
     else{
        echo "error -> " . $conn->error;
     }
     
     $conn->close();
  }
