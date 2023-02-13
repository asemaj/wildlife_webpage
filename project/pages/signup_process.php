<?php  

  if (empty($_POST["name"])) {  
     die("Name Field is required");  
  } 

  if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false){ 
     die("please enter a valid email address");   
  }
  if (strlen($_POST['password1']) < 8){
    die("please enter atleast 8 characters");
  }
  if( ! preg_match("/[A-Z]/i", $_POST["password1"])){
    die("please enter atleast 1 uppercase letter");
  }
  if(! preg_match("/[@$!%*?&]/", $_POST["password1"])){
    die("please enter atleast 1 speacial symbol");
  }
  if(! preg_match("/[0-9]/", $_POST["password1"])){
    die("please enter atleast 1 number");
  }
  if($_POST["password1"] !== $_POST["password2"]){
    die("Passwords are not the same");
  }
  if(! preg_match("/^\\(?([0-9]{3})\\)?[-.\\s]?([0-9]{3})[-.\\s]?([0-9]{4})$/", $_POST['phone'])){
    die("Invalid phone number");
 }
  $password_hash = password_hash($_POST["password1"], PASSWORD_DEFAULT);

  $mysqli = require __DIR__ . "/database.php";
  
  $sql = "INSERT INTO users (username,firstName, middleName, lastName, sex, email, phone, password_hash)
          VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

  $result = $mysqli->query($sql);
          
  $stmt = $mysqli->stmt_init();
  
  if ( ! $stmt->prepare($sql)) {
      die("SQL error: " . $mysqli->error);
  }
  
  
  $stmt->bind_param("ssssssss",
                    $_POST["username"],
                    $_POST["name"],
                    $_POST["m-name"],
                    $_POST["l-name"],
                    $_POST["sex"],
                    $_POST["email"],
                    $_POST["phone"],
                    $password_hash);
  if($stmt->execute()){
    header("Location: index.php");
  }
  else{
    die("Error: " . $stmt->error);
  }


