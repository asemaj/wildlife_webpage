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
        .content{
            background-color: white;
        }
        .content div h1{
            text-align: center;
            padding-bottom: 20px;
            padding-top: 20px;
        }
        .content div p{
            font-size: 20px;
            padding-bottom: 10px;
        }
        .content div ul li{
            margin-bottom: 10px;
        }
    </style>


    <title>Wildlife</title>
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

    <div class="container-fluid content">
        <div class="row">
            <h1>Animals</h1>
            <div class="col-md-3"></div>

            <div class="col-md-6">
                <p>
                    Animals are a diverse group of organisms that share certain characteristics, such as being multicellular, having cells that are not encased in a hard shell, and being able to respond to their environment. They are found in almost every habitat on Earth, from the deepest oceans to the highest mountains, and come in a wide variety of shapes, sizes, and forms.<br>

                    There are over 1 million known species of animals, and new species are still being discovered. They can be classified into several different groups, including mammals, birds, fish, reptiles, amphibians, and invertebrates. Each group has its own unique characteristics and adaptations that help them survive in their specific environment.<br>
                    
                    Mammals are warm-blooded animals that have hair or fur, and produce milk to feed their young. Examples include dogs, cats, lions and elephants. Birds have feathers, beaks, and wings, and are known for their ability to fly. Fish live in water and have gills to extract oxygen. Examples include salmon, tuna and sharks. Reptiles are cold-blooded animals that have scaly skin and lay eggs. Examples include snakes, lizards, and crocodiles. Amphibians are cold-blooded animals that live both on land and in water, and have smooth skin. Examples include frogs and salamanders. Invertebrates are animals that do not have a backbone, and include a wide variety of animals such as insects, worms, and crustaceans.<br>
                    
                    Animals play important roles in the ecosystem, from being a food source for other animals to helping to pollinate plants. Many animals also have cultural and economic significance to humans, such as being used for food, clothing, and medicine.<br>
                    
                    It is important to remember that all animal species, big or small, have the right to live their life without human interference, and their extinction can have a ripple effect on the whole ecosystem. Conservation efforts are important to protect and preserve endangered species for future generations.</p>

                <section id="dolphins" >
                    <h1>Dolpins</h1>
                    <p>Dolphins are a fascinating group of marine mammals known for their intelligence, playful behavior, and striking appearance. Here are some interesting facts and information about dolphins:</p><br>
                        <ul>
                            <li>Dolphins are part of the Cetacean family, which also includes whales and porpoises.</li>
                            <li>They have a streamlined body shape and a dorsal fin on their back, which helps them swim quickly and efficiently.</li>
                            <li>They have a complex nervous system, and are considered to be one of the most intelligent animals on Earth.</li>
                            <li>They use a variety of vocalizations to communicate with each other, including whistles, clicks, and burst-pulsed sounds.</li>
                            <li>They have a complex social structure and live in groups called pods. These pods can range in size from just a few individuals to several hundred.</li>
                            <li>They are known for their acrobatic displays, such as leaping and spinning out of the water.</li>
                            <li>They use echolocation to navigate and hunt for food, which allows them to locate objects by emitting high-frequency sounds and listening for the echoes.</li>
                            <li>They have a diverse diet that includes fish, squid, and crustaceans.</li>
                            <li>They have a strong bond with other members of their pod and have been observed helping injured or sick individuals.</li>
                            <li>Some dolphins are known to form relationships with other species, such as sea turtles and sharks, and even humans.</li>
                            <li>They are also known to show empathy, and have been observed comforting others in distress.</li>
                        </ul>
                        <p>Unfortunately, many dolphin species are facing threats from human activities such as pollution, overfishing, and hunting. Conservation efforts are important to protect and preserve these intelligent and fascinating animals for future generations.
                        These are some of the most known facts about dolphins, there are many more things to discover about these intelligent creatures, and they continue to surprise us with their complex behaviors and social structures.</p>
                </section>
                <section id="polarbears" >
                    <h1>Polarbears</h1>
                    <p>Polar bears are one of the most iconic and beloved Arctic animals, known for their massive size, thick fur, and powerful hunting abilities. Here are some interesting facts and information about polar bears that could be included on a website dedicated to these animals:</p><br>
                    <ul>
                        <li>Polar bears are the largest land-based carnivores in the world, with males weighing up to 600 kg (1,300 lbs) and females weighing up to 400 kg (880 lbs). </li>
                        <li>They are native to the Arctic, and are found in Canada, Alaska, Greenland, Norway, and Russia. </li>
                        <li>Their thick fur and a layer of blubber help them survive in the cold, harsh Arctic environment. </li>
                        <li> They are excellent swimmers, and have been known to swim for miles at a time in search of food.</li>
                        <li>They are apex predators and feed mostly on seals, but also consume walrus, fish, and other marine mammals. </li>
                        <li>They have large paws with sharp claws that help them catch prey and move on ice and snow. </li>
                        <li>They have a keen sense of smell that allows them to locate prey from miles away. </li>
                        <li>They are solitary animals and spend most of their time alone, except during the mating season. </li>
                        <li>They have a low reproductive rate, with females only producing litters of cubs every 3-4 years. </li>
                        <li>They have an average life span of 20-30 years in the wild. </li>
                        <li>Climate change is a major threat to polar bears, as it leads to the melting of sea ice, which is essential for hunting and breeding. Pollution and over hunting also threatens polar bears population. </li>
                        <li>Conservation efforts are important to protect and preserve these magnificent animals for future generations. </li>
                    </ul><br>
                    <p>These facts provide a general overview of the polar bears, their behavior, and the challenges they are facing. It is important to note that polar bears are an iconic symbol of the Arctic and are facing many threats due to human activities such as climate change and pollution.</p>
                </section>
                <section id="penguins">
                    <h1>Penguins</h1>
                    <p>Penguins are flightless birds that are known for their distinctive black and white plumage and unique swimming abilities. Here are some interesting facts and information about penguins that could be included on a website dedicated to these animals:</p><br>
                    <ul>
                        <li>Penguins are found in cold climates, such as Antarctica and the southern hemisphere.</li>
                        <li>They have a streamlined body shape and waterproof feathers that are adapted for swimming. They can reach speeds of up to 15 miles per hour in the water.</li>
                        <li>They spend most of their time in the water, and only come on land to breed and rest.</li>
                        <li>They have a diverse diet that includes fish, krill, and squid.</li>
                        <li>They have a unique huddling behavior to stay warm in cold temperatures.</li>
                        <li>They have a monogamous breeding system, where they form long-term pair bonds with one mate.</li>
                        <li>They have a unique vocalization system to communicate with each other.</li>
                        <li>They have a low reproductive rate, with females only producing one or two eggs per breeding season.</li>
                        <li>They have an average life span of 15-20 years in the wild.</li>
                        <li>Climate change is a major threat to penguins, as it leads to changes in sea temperature and sea-ice conditions that affect their food sources and breeding habitats. Pollution and overfishing also threaten penguins' populations.</li>
                        <li>Conservation efforts are important to protect and preserve these fascinating birds for future generations.</li>
                    </ul><br>
                    <p>These facts provide a general overview of the penguins, their behavior, and the challenges they are facing. It is important to note that there are 18 different species of penguins, each with their own unique characteristics and behaviors, and that penguins are facing many threats due to human activities such as climate change, pollution, and overfishing.</p>
                </section>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

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