<?php
$isvalid = false;
if($_SERVER["REQUEST_METHOD"] === "POST"){
    
    $mysqli = require __DIR__ . "/database.php";

    $sql = sprintf("SELECT * FROM users 
            WHERE username = '%s'",
            $mysqli->real_escape_string($_POST["username"]));

    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();

    if($user){
        if(password_verify($_POST["password"], $user["password_hash"])){
            session_start();
            session_regenerate_id();
            $_SESSION["username"] = $user["username"];
            $_SESSION["id"] = $user["id"];
            header("Location: index.php");
            exit();
        }
    }
    $isvalid = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">

    </script>
    <link rel="stylesheet" href="style.css">

    <title>Wildlife</title>
</head>

<body style="background-color:white"> 
    <div class="container-fluid">
        <div class="row head d-flex justify-content-center">
            <div class="col-md-6">
                <div id="sideNav">
                    <button id="sideNavClose">&times;</button>
                    <?php if(isset($user)): ?>
                        <p><a href="profile.php"><?= $user['username'] ?></a></p>
                        <p><a href="logout.php">logout</a></p>
                    <?php else: ?>
                        <p><a href="login.page.php">login</a></p>
                    <?php endif; ?>
                    <a href="index.php">home</a>
                    <a href="news.php">news</a>
                    <a href="animals.php">Animals</a>
                </div>

                <button id="sideNavOpen"><span>Menu</span>&#187;</button>
                <script type="text/javascript">
                    const menu = document.getElementById('sideNav');
                    const menuOpen = document.getElementById('sideNavOpen');
                    const menuClose = document.getElementById('sideNavClose');
                    var sideNavOpenButtonClick = function() {
                        menu.style.width = '250px';
                        menuOpen.style.display = 'none';
                        menuClose.style.display = 'block';
                    }
                    var sideNavCloseButtonClick = function() {
                        menu.style.width = '0';
                        menuOpen.style.display = 'block';
                        menuClose.style.display = 'none';
                    }
                    menuOpen.addEventListener('click', sideNavOpenButtonClick);
                    menuClose.addEventListener('click', sideNavCloseButtonClick);
                </script>
                <p id="menu_title">Wildlife</p>
            </div>
            <div class="col-md-6 head_2">
                <div class="menu">  
                    <nav>
                        <ul>           
                            <li> <a href="animals.php" class="menu" class="animal-menu">Animals</a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown_choices"><a href="http://localhost/web-project-Asem%20al%20ajlouni/pages/animals.php#polarbears"  class="sub_Animal_Menu">Polar bear</a></li>
                                    <li class="dropdown_choices"><a href="http://localhost/web-project-Asem%20al%20ajlouni/pages/animals.php#penguins" class="sub_Animal_Menu">penguins</a></li>
                                    <li class="dropdown_choices"><a href="http://localhost/web-project-Asem%20al%20ajlouni/pages/animals.php#dolphins" class="sub_Animal_Menu">dolphins</a></li>
                                    <li class="search_box">
                                    <input type="search" name="search" id="search" placeholder="search">
                                    <button type="button" class="sub_dropdown_Menu_button" id="search_button"><i class="fa fa-search" aria-hidden="true"></i>
                                    </button>            
                                    </li>
                                </ul>
                            </li>
                            <li><a href="news.php" class="menu">News</a></li>
                            <li><a href="index.php" class="menu" id="first_menu">Home</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid signin_form_box">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 signin">
                <form method="POST" action="login.page.php">
                    <h1 id="signin_title">Login</h1>
                    <label for="username" class="signin_align">Username: </label><br>
                    <input type="text" name="username" id="Signin_username" class="signin_align" ><br>
                    <label for="password" class="signin_align">password: </label><br>
                    <input type="password" name="password" id="signin_password" class="signin_align"><br>
                    <button type="submit" id="signin_btn" class="signin_align">Login</button>
                </form>
                <p><a href="password_reset.php">forgot password?</a>, dont have an account? <a href="signup.php"> sign up</a></p>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>
</html>