<?php
$isvalid = true;
session_start();

if(isset($_SESSION["username"])){
    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM users 
            WHERE id = {$_SESSION["id"]}";

    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}
if($_SERVER["REQUEST_METHOD"] === "POST"){
    if($user){
        if(password_verify($_POST["update_password_confirmation"], $user["password_hash"])){
            session_start();
            session_regenerate_id();
            $_SESSION["username"] = $user["username"];
            $_SESSION["id"] = $user["id"];
            $_SESSION["firstName"] = $user["firstName"];
            $_SESSION["middleName"] = $user["middleName"];
            $_SESSION["lastName"] = $user["lastName"];
            $_SESSION["email"] = $user["email"];
            $_SESSION["phone"] = $user["phone"];
        }
    }
    $isvalid = false;
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

    <style>
        #update_info_div{
            display: block;
            position: fixed;
            top:50%;
            left: 50%;
            width: 300px;
            height: 200px;
            background-color: white;
            text-align: center;
            padding-top:100px;
            
        }
        section{
            background-color: white;
            text-align: center;
        }
    </style>
</head>

<body>
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
                                    <li class="dropdown_choices"><a href="#polarbears" class="sub_Animal_Menu">Polar bear</a></li>
                                    <li class="dropdown_choices"><a href="#penguins" class="sub_Animal_Menu">penguins</a></li>
                                    <li class="dropdown_choices"><a href="#dolphins" class="sub_Animal_Menu">dolphins</a></li>
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
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Update profile</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-4">
                <form method="post" action="update_database.php">
                    <table>
                        <tr>
                            <td><label for="session_username_update">Username: </label></td>
                            <td><input type="text" name="session_username_update" placeholder="<?= $user['username']?>"></td>
                        </tr>
                        <tr>
                            <td><label for="session_firstname_update">First name: </label></td>
                            <td><input type="text" name="session_firstname_update" placeholder="<?= $user["firstName"]?>"></td>
                        </tr>
                        <tr>
                            <td><label for="session_lastname_update">last name: </label></td>
                            <td><input type="text" name="session_lastname_update" placeholder="<?= $user["lastName"]?>"></td>
                        </tr>
                        <tr>
                            <td><label for="session_middlename_update">middle name: </label></td>
                            <td><input type="text" name="session_middlename_update" placeholder="<?= $user["middleName"]?>"></td>
                        </tr>
                        <tr>
                            <td><label for="session_email_update">email: </label></td>
                            <td><input type="text" name="session_email_update" placeholder="<?= $user["email"]?>"></td>
                        </tr>
                        <tr>
                            <td><label for="session_phone_update">Phone Number: </label></td>
                            <td><input type="text" name="session_phone_update" placeholder="<?= $user["phone"]?>" ></td>
                        </tr>
                        <tr>
                            <td>update password: </td>
                            <td><input type="password" name="session_password_update" placeholder="update password"></td>
                        </tr>
                        <tr>
                            <td><button type="submit">Update</button></td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</section>
</body>
</body>
<footer>
    <div class="footer">
        <div class="container-fluid">
            <hr width="100%">
            <div class="row">
                <div class="col-md-2 footer-section-1">
                    <img src="bear-logo.webp" alt="" id="footer-logo">
                </div>
                <div class="col-md-5 footer-section-1">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lacus leo, cursus eu iaculis quis, ultrices et metus. Proin vitae felis lacus. Sed varius nulla eget nisi porta pellentesque.</p>
                </div>
                <div class="col-md-5 footer-section-2"> 
                    <div class="row">   
                        <div class="col-md-3 socials ">
                            <a href="https://twitter.com/?lang=en" id="socials"><i class="fab fa-twitter"></i></a>
                        </div>   

                        <div class="col-md-3 socials">
                            <a href="https://www.youtube.com/" id="socials"><i class="fab fa-youtube"></i></a>
                        </div>

                        <div class="col-md-3 socials">
                            <a href="https://www.facebook.com" id="socials"><i class="fab fa-facebook-f"></i></a>
                        </div>
                        <div class="col-md-3 socials">
                            <a href="https://www.facebook.com" id="socials"><i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</html>