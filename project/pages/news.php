<?php

session_start();

if(isset($_SESSION["username"])){
    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM users
            WHERE id = {$_SESSION["id"]}";

    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
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

    <style>
        body{
            background-color: white;
        }
        #expand,#expand1{
            height: 200px;
            overflow: hidden;
            transition:transform 1.8s;
        }
        .news_content{
            font-size: 20px;
        }
        #expandbtn,#expandbtn1{
            font-size: 30px;
            transform: rotate(90deg);
            width: 30px;
            border-radius: 15px;
            position: absolute;
            left: 50%;
            cursor: pointer;
            z-index: 1;
        }
        #shrink,#shrink1{
            display: none;
            font-size: 30px;
            transform: rotate(-90deg);
            width: 30px;
            border-radius: 15px;
            position: absolute;
            left: 50%;
            cursor: pointer;
            
        }
    </style>
    
    <title>Wildlife</title>
</head>

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

<body style="background-color: white;">
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 style="text-align: center; margin-bottom: 50px; margin-top: 40px">Latest News</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div id="expand">
                    <h1>Penguins</h1>
                    <h4>Found primarily in the Southern Hemisphere</h4>
                    <p class="news_content">Penguins are a group of flightless birds that are found primarily in the Southern Hemisphere. There are 17 to 19 different species of penguins, each with their own unique characteristics and ranges. Some of the most well-known species include the tiny blue penguins of Australia and New Zealand, the majestic emperor penguins of Antarctica, and the king penguins found on many sub-Antarctic islands. Additionally, there is the endangered African penguin and the Galápagos penguin, which is the only penguin species found north of the equator.

                        Despite being birds, penguins have flippers instead of wings, which means they are unable to fly. On land, they have a distinctive waddling gait, but when the snow conditions are right, they will slide on their bellies. In the water, however, penguins are expert swimmers and divers, with some species able to reach speeds of up to 15 miles per hour.
                        
                        One of the most notable features of penguins is their distinctive coloring, which consists of a black body and white belly. This coloring helps the birds to camouflage in the water as they search for food, which typically consists of small shrimp, fish, crabs, and squid.
                        
                        In summary, penguins are a diverse and fascinating group of birds that are found primarily in the Southern Hemisphere. They are flightless, but expert swimmers and divers, with a distinctive coloring that helps them to blend into their aquatic environments. Many species are also endangered and conservation efforts are ongoing to protect them.</p>
                        
                        <p>visit <a href="https://www.worldwildlife.org/species/penguin">worldWildlife</a> to learn more</p>
                </div>
                <button id="expandbtn" >&#10095;</button>
                <button id="shrink" >&#10095;</button>

                <div id="expand1" style="margin-top: 120px;">
                    <h1>Dolphins</h1>
                    <h4>highly intelligent marine mammals</h4>
                    <p class="news_content">Dolphins are highly intelligent marine mammals that belong to the family Delphinidae. There are over 40 species of dolphins, ranging in size from just over 4 feet (1.2 meters) to over 30 feet (9 meters) in length. They are found in oceans and rivers around the world. Dolphins have a streamlined body shape and a dorsal fin that helps them swim efficiently. They are known for their playful behavior and intelligence, and are often trained for entertainment or research purposes. They are also known for their echolocation abilities which help them navigate and hunt for food.

                        Dolphins are social animals and typically live in groups called pods. These pods can range in size from a few individuals to hundreds. Within these groups, dolphins have complex relationships and communication patterns. They use a variety of vocalizations and body language to communicate with one another.
                        
                        Dolphins are apex predators, meaning they are at the top of the food chain and have no natural predators. They are opportunistic feeders and eat a wide variety of prey, including fish, squid, and crustaceans.
                        
                        Dolphins are considered to be a "non-human person" by some scientists and ethicists, and are granted some level of legal protection in some countries. Though they are not considered to be a endangered species, some populations are under threat from human activities such as pollution, overfishing, and hunting.</p>
                        
                        <p>visit <a href="https://www.worldwildlife.org/species/irrawaddy-dolphin">worldWildlife</a> to learn more</p>
                        <video src="dolphin1.mp4" width="100%" controls autoplay muted loop></video>
                </div>
                <button id="expandbtn1" >&#10095;</button>
                <button id="shrink1" style="margin-bottom: 100px;">&#10095;</button>
                
                <script type="text/javascript">
                    const btn = document.getElementById("expandbtn");
                    const closebtn = document.getElementById("shrink");
                    const content = document.getElementById("expand");

                    const btn1 = document.getElementById("expandbtn1");
                    const closebtn1 = document.getElementById("shrink1");
                    const content1 = document.getElementById("expand1");

                    var open = function(){
                        content.style.height = "710px";
                        btn.style.display = "none";
                        closebtn.style.display = "block";
                    };

                    var close = function(){
                        content.style.height = "200px";
                        btn.style.display = "block";
                        closebtn.style.display = "none";

                    };

                    var open1 = function(){
                        content1.style.height = "1400px";
                        btn1.style.display = "none";
                        closebtn1.style.display = "block";
                    };

                    var close1 = function(){
                        content1.style.height = "200px";
                        btn1.style.display = "block";
                        closebtn1.style.display = "none";
                    };


                    closebtn.addEventListener("click", close);
                    btn.addEventListener("click", open);

                    closebtn1.addEventListener("click", close1);
                    btn1.addEventListener("click", open1);

                    


                </script>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>



<footer>
    <hr width="100%">
    <div class="footer">
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
</footer>
</html>