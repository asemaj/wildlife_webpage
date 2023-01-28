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
            <div class="col-md-2"></div>
            <div class="col-md-8 tos_section">
                <h1>Terms of Service</h1>
                <hr>
                <ul>
                    <li style="list-style: none; text-align: left;;">Thank you for choosing to use our website. The Site is provided by wildlife.co and is intended for use as is. By accessing or using the Site, you signify that you have read, understand, and agree to be bound by these terms of service ("Terms of Service" or "Terms") and to the collection, use, and sharing of your information as set forth in our Privacy Policy, whether or not you are a registered user of our Site. If you do not agree to these Terms, you may not access or use the Site.<br><br></li>

                    <li>We reserve the right to change, modify, or update these Terms at any time without prior notice. It is your responsibility to check these Terms periodically for changes. Your continued use of the Site following the posting of any changes will mean that you accept and agree to the changes.<br><br></li>

                    <li>Use of the Site
                    
                        You may use the Site only for lawful purposes and in accordance with these Terms. You agree not to use the Site:
                        
                        In any way that violates any applicable federal, state, local, or international law or regulation.
                        For the purpose of exploiting, harming, or attempting to exploit or harm minors in any way by exposing them to inappropriate content, asking for personally identifiable information, or otherwise.
                        To transmit, or procure the sending of, any advertising or promotional material, including any "junk mail," "chain letter," "spam," or any other similar solicitation.
                        To impersonate or attempt to impersonate [Company Name], a [Company Name] employee, another User, or any other person or entity.
                        To engage in any other conduct that restricts or inhibits anyone's use or enjoyment of the Site, or which, as determined by us, may harm [Company Name] or users of the Site or expose them to liability.
                        We reserve the right to terminate or restrict your use of the Site for any reason at any time without notice.<br><br></li>

                    <li>Content on the Site
                    
                        The Site and its original content, features, and functionality are owned by [Company Name] and are protected by international copyright and trademark laws. Any reproduction, modification, distribution, or republication of the Site or its content without the prior written consent of [Company Name] is strictly prohibited.
                        
                        The Site may contain content provided by third parties, including links to other websites or resources. We are not responsible for the content or accuracy of any third-party content and do not endorse any such content. If you choose to access a third-party website or resource, you do so at your own risk.
                        
                        We reserve the right to remove any content from the Site at any time without notice.<br><br></li>
                    
                    <li>User Contributions
                    
                        The Site may contain features that allow users to post, submit, or otherwise contribute content to the Site ("User Contributions"). By posting, submitting, or otherwise contributing User Contributions to the Site, you grant [Company Name] a worldwide, non-exclusive, royalty-free, perpetual, irrevocable, and fully sublicensable license to use, reproduce, modify, adapt, publish, translate, create derivative works from, distribute, and display your User Contributions in any and all media. You represent and warrant that you have the right to grant this license and that your User Contributions do not infringe upon the intellectual property rights or any other rights of any third party.
                        
                        We reserve the right to remove any User Contributions from the Site at any time without notice.<br><br></li>
                    
                    <li>Accounts
                    
                        In order to access certain features of the Site, you may be required to create an account. You are responsible for maintaining the confidentiality of your account and password and for restricting access to your account.</li>
                    
                </ul>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</body>

<footer>
    <div class="footer">
        <div class="container-fluid">
            <hr width="100%">
            <div class="row">
                <div class="col-4 footer-section-1">
                    <img src="bear-logo.webp" alt="" id="footer-logo">
                </div>
                <div class="col-8 footer-section-1">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lacus leo, cursus eu iaculis quis, ultrices et metus. Proin vitae felis lacus. Sed varius nulla eget nisi porta pellentesque.</p>
                </div>
            </div>
        </div>
        <div class="container-fluid d-flex justify-content-center">
            <div class="row">
                    <div class="col-3 socials ">
                         <a href="https://twitter.com/?lang=en" id="socials"><i class="fab fa-twitter"></i></a>
                    </div>   

                    <div class="col-3 socials">
                        <a href="https://www.youtube.com/" id="socials"><i class="fab fa-youtube"></i></a>
                    </div>

                    <div class="col-3 socials">
                    <a href="https://www.facebook.com" id="socials"><i class="fab fa-facebook-f"></i></a>
                    </div>
                    <div class="col-3 socials">
                    <a href="https://www.facebook.com" id="socials"><i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
</html>