<?php 
if(isset($_GET["expired"]))
    echo '<script>alert("Sesiunea a expirat!")</script>';
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Groupware</title>
    <link rel="stylesheet" href="/css/styles.css">
    <script src="/js/jquery.js"></script>
    <script src="/js/index.js"></script>
</head>
<body>
    <div class="navbar">
        <div class="incipit">
            <p class="logo">Together</p>
            <form id="project_select">
                <select id="project_selector" disabled>
                    <option value="">Select your project</option>
                </select>
            </form>
        </div>
        <div class="buts">
            <button class="navbarbut" id="Login">Login</button>
            <button class="navbarbut" id="Register">Register</button>
        </div>
    </div>
    <p id="welcome">BUN VENIT!</p>
    <p id="selecteaza">Pentru a incepe te rugam sa te inregistrezi</p>
    <div class="login">
        <form name="login" id="login" action="functions/login.inc.php" method="POST">
            <p style="font-size:20px;font-family:helvetica;text-align:center;">Please enter your credentials!</p>
            <div style="display:flex; flex-direction:row; justify-content:space-around;position:relative;top:10px">
                <label class="form-label" for="email-login">Email</label>
                <input type="email" id="email-login" name="email-login"/>
            </div>
            <div style="display:flex; flex-direction:row; justify-content:space-around;top:20px;position:relative;">
                <label class="form-label" for="password-login">Password</label>
                <input type="password" id="password-login" name="password-login"/>
            </div>
            <div style="display:flex; flex-direction:row; justify-content:space-around;top:30px;position:relative;">
                <button class="submit" type="submit" name="submit-login">Login</button>
            </div>
            <?php
            if(isset($_GET["errorLogin"])){
                echo '<script type="text/javascript">alert("Eroare la conectare!");</script>';
                if($_GET["errorLogin"]=="emptyInputLogin"){
                    echo '<p style="position:relative;top:20px;color:red;text-align:center;"> Some fields are empty</p>';
                }
                else
                if($_GET["errorLogin"]=="invalidEmailLogin"){
                    echo '<p style="position:relative;top:20px;color:red;text-align:center;"> Invalid Email</p>';
                }
                else
                if($_GET["errorLogin"]=="invalidPasswordLogin"){
                    echo '<p style="position:relative;top:20px;color:red;text-align:center;"> Invalid Password</p>';
                }
                else
                if($_GET["errorLogin"]=="stmtFailedLogin"){
                    echo '<p style="position:relative;top:20px;color:red;text-align:center;"> Statement failed! Server error!</p>';
                }
                else
                if($_GET["errorLogin"]=="passwordWrongLogin"){
                    echo '<p style="position:relative;top:20px;color:red;text-align:center;"> The email and password dont match!</p>';
                }
                else
                if($_GET["errorLogin"]=="emailDoesntExists"){
                    echo '<p style="position:relative;top:20px;color:red;text-align:center;"> This email is not registered!</p>';
                }
            }?>
        </form>
    </div>
    <div class="register">
        <form name="register" id="register" action="functions/register.inc.php" method="POST">
            <p style="font-size:20px;font-family:helvetica;text-align:center;">Please enter your credentials!</p>
            <div style="display:flex; flex-direction:row; justify-content:space-around;position:relative;top:10px">
                <label class="form-label" for="user-register">Username</label>
                <input type="text" id="user-register" name="user-register"/>
            </div>
            <div style="display:flex; flex-direction:row; justify-content:space-around;position:relative;top:20px">
                <label class="form-label" for="email-register">Email</label>
                <input type="email" id="email-register" name="email-register"/>
            </div>
            <div style="display:flex; flex-direction:row; justify-content:space-around;top:30px;position:relative;">
                <label class="form-label" for="password-register">Password</label>
                <input type="password" id="password-register" name="password-register"/>
            </div>
            <div style="display:flex; flex-direction:row; justify-content:space-around;top:40px;position:relative;">
                <label class="form-label" for="retype-password-register">Retype Password</label>
                <input type="password" id="retype-password-register" name="retype-password-register"/>
            </div>
            <div style="display:flex; flex-direction:row; justify-content:space-around;top:50px;position:relative;">
                <button class="submit" type="submit" name="submit-register">Register</button>
            </div>
            <?php
            if(isset($_GET["errorRegister"])){
                echo '<script type="text/javascript">alert("Eroare la inregistrare!");</script>';
                if($_GET["errorRegister"]=="emptyInputRegister"){
                    echo '<p style="position:relative;top:40px;color:red;text-align:center;"> Some fields are empty</p>';
                }
                else
                if($_GET["errorRegister"]=="invalidEmailRegister"){
                    echo '<p style="position:relative;top:40px;color:red;text-align:center;"> Invalid Email</p>';
                }
                else
                if($_GET["errorRegister"]=="invalidPasswordRegister"){
                    echo '<p style="position:relative;top:40px;color:red;text-align:center;"> Invalid Password</p>';
                }
                else
                if($_GET["errorRegister"]=="stmtFailedRegister1"){
                    echo '<p style="position:relative;top:40px;color:red;text-align:center;"> Statement failed! Server error!</p>';
                }
                else
                if($_GET["errorRegister"]=="passwordMatchRegister"){
                    echo '<p style="position:relative;top:40px;color:red;text-align:center;"> The passwords dont match!</p>';
                }
                else
                if($_GET["errorRegister"]=="userExistsRegister"){
                    echo '<p style="position:relative;top:40px;color:red;text-align:center;"> This user is already registered!</p>';
                }
                else
                if($_GET["errorRegister"]=="emailExistsRegister"){
                    echo '<p style="position:relative;top:40px;color:red;text-align:center;"> This email is already registered!</p>';
                }
                if($_GET["errorRegister"]=="stmtFailedRegister2"){
                    echo '<p style="position:relative;top:40px;color:red;text-align:center;">  Statement failed! Server error!</p>';
                }
                if($_GET["errorRegister"]=="stmtFailedRegister3"){
                    echo '<p style="position:relative;top:40px;color:red;text-align:center;">  Statement failed! Server error!</p>';
                }
            }
            if(isset($_GET["succes"])){
                echo '<script type="text/javascript">alert("Contul a fost creat cu succes!");</script>';
            }
            ?>
        </form>
    </div>
</body>
</html>