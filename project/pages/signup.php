<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="style.css">
    <title>Wildlife</title>
</head>

<body style="background-color: white;">
    <div class="container-fluid" >
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
                    <a href="animals.html">Animals</a>
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
                            <li> <a href="#" class="menu" class="animal-menu">Animals</a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown_choices"><a href="#" class="sub_Animal_Menu">Polar bear</a></li>
                                    <li class="dropdown_choices"><a href="#" class="sub_Animal_Menu">penguins</a></li>
                                    <li class="dropdown_choices"><a href="#" class="sub_Animal_Menu">wolves</a></li>
                                    <li class="search_box">
                                    <input type="search" name="search" id="search" placeholder="search">
                                    <button type="button" class="sub_dropdown_Menu_button" id="search_button"><i class="fa fa-search" aria-hidden="true"></i>
                                    </button>            
                                    </li>
                                </ul>
                            </li>
                            <li><a href="news.html" class="menu">News</a></li>
                            <li><a href="index.html" class="menu" id="first_menu">Home</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-md-3"></div>
            <div class="col-md-6 form-box">
                <p id="form-title">SIGN UP</p>
                <form method="post" id="submit_form" action="signup_process.php" onsubmit="validation_test(event)">
                <p class="alert"></p>
                <div id="table">
                    <div>
                        <label for="name">First Name:<span class="required">*</span> </label>
                        <input type="text" min="7" name="name" placeholder="First Name" id="fname"class="form_inputs" onfocus="check_input()" >
                        <i class="fa fa-check-circle" id="fname_CheckMark"></i>
                    </div>
        
                    <div>
                        <label for="l-name">Last Name:<span class="required">*</span> </label>
                        <input type="text" name="l-name" placeholder="last Name"id="lname" class="form_inputs" onfocus="check_input()">
                        <i class="fa fa-check-circle" id="lname_CheckMark"></i>
                    </div>
        
                    <div>
                        <label for="m-name">Middle Name (optional):</label>
                        <input type="text" name="m-name" placeholder="Middle Name" id="mname" class="form_inputs">
                    </div>

                    <div>
                        <label>Sex: </label>
                        <label><input type="radio" name="sex" value="male" id="male" class="form_inputs" > male &#9794;</label>
                        <label><input type="radio" name="sex" value="female" id="female" class="form_inputs"> female &#9792;</label>
                        <p class="alert"></p>
                    </div>

                    <div>
                        <label for="email">Email:<span class="required">*</span> </label>
                        <input type="text" name="email" placeholder="example@gmail.com" id="email" class="form_inputs" >
                        <p id="email_alert"></p>
                    </div>

                    <div>
                        <label for="phone">Phone: </label>
                        <input type="number" name="phone" placeholder="Phone Number" class="form_inputs" style="display: inline;">
                    </div>
    
                    <div>
                        <label for="username">Username:<span class="required">*</span> </label>
                        <input type="text" name="username" placeholder="username" id="username" class="form_inputs">
                        <p class="alert"></p>       
                    </div>

                    <div class="false_input">
                        <label for="password1">Password:<span class="required">*</span> </label>
                        <input type="password" name="password1" class="form_inputs test1"  id="password1" placeholder="Password"  onblur="validatePassword()">
                        <i class="fa fa-check-circle" id="password_CheckMark"></i>
                        <p id="min_char"><i class="fa fa-exclamation-circle"></i>The passwod should include atleast 8 characters and atleast one Upper case</p>
                        <p id="min_num"><i class="fa fa-exclamation-circle"></i>The password should include atleast one Number (0-9)</p>
                        <p id="special_char"><i class="fa fa-exclamation-circle"></i>The password should inclide atleast one special character (@$!%*?&)</p>
                    </div>

                    <div>
                        <label for="password2" id="lable_width">Confirm password:<span class="required">*</span></label>
                        <input type="password" name="password2"  id="password2" class="form_inputs test2" placeholder="confirm password" onblur="confirm_password()">
                        <i class="fa fa-check-circle" id="password_confirm_CheckMark" onblur="confirm_password()"></i>
                        <p id="confirm_password">the passwords should match</p>
                    </div>

                    <div>
                        <label style="font-size: 21px; "><input type="radio" class="display_inline" name="Remember" id="remember" class="form_inputs display_inline" value=0 >Remember me</label><label style="font-size: 21px;" class="display_inline" ><input type="radio" name="Remember" id="remember" class="form_inputs display_inline " value=0> Don't remember</label>

                    </div>

                    <div>
                        <label for="TOS">Terms Of Service:</label>
                    </div>
                    
                    <div>
                        <input type="checkbox" name="TOS" class="TOS form_inputs" value="1" id="tos2_check">
                        <p class="display_inline"><span class="TOS">I accept and agree to the <a href="TOS.php" id="tosLink">Terms of Services</a></span></p>
                        <p id="tos_check"><i class="fa fa-check-circle" ></i></p>
                    </div>

                    <div>
                        <button type="submit" id="submitButton" >SIGN UP</button>
                    </div>
                    
                </div>
                <script src="functions.js"></script>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
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